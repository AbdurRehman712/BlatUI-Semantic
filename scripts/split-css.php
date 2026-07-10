<?php
/**
 * BlatUI Semantic — CSS Splitter
 *
 * Reads the monolithic semantic-base.css, splits each component section
 * into a standalone per-component CSS file co-located at stubs/ui/<slug>.css,
 * and updates index.json to reference each CSS file.
 *
 * Usage:
 *   php scripts/split-css.php
 *
 * Each output file wraps its rules in @layer components { ... }
 * and uses @reference "tailwindcss" for theme variable resolution.
 * After splitting, semantic-base.css remains as the optional convenience
 * bundle (it can also be regenerated via the --rebundle flag).
 *
 * Run this whenever semantic-base.css is updated to keep per-component
 * files in sync.
 */

// ---- Config ----
$MONOLITH  = __DIR__ . '/../stubs/semantic-base.css';
$UI_DIR    = __DIR__ . '/../stubs/ui';
$INDEX     = __DIR__ . '/../index.json';
$DARK      = __DIR__ . '/../stubs/dark.css';

// ---- Flags ----
$REBUNDLE = in_array('--rebundle', array_slice($argv, 1), true);

// ---- Parse the monolith ----
if (!file_exists($MONOLITH)) {
    fwrite(STDERR, "ERROR: $MONOLITH not found\n");
    exit(1);
}

$lines = file($MONOLITH);
if ($lines === false) {
    fwrite(STDERR, "ERROR: could not read $MONOLITH\n");
    exit(1);
}

// Helper: line content (no trailing whitespace)
function ln(int $i): string { global $lines; $l = $lines[$i] ?? ''; return rtrim($l, "\r\n"); }

/**
 * Rebuild the monolithic semantic-base.css from the per-component
 * stubs/ui/<slug>.css files.
 *
 * Strategy:
 *  - Keep the original file's header (everything up to and including
 *    the `@layer components {` opening line).
 *  - For each parsed section, replace its body with the content read
 *    from stubs/ui/<slug>.css (the @layer components wrapper is stripped).
 *  - Keep everything from the `@layer utilities` block onward, but
 *    regenerate it from stubs/dark.css so dark overrides stay in sync.
 *
 * @param string $monolith  Path to semantic-base.css (overwritten).
 * @param string $uiDir     Directory containing per-component CSS files.
 * @param string $dark      Path to dark.css (source of the utilities block).
 * @param array  $sections  Parsed sections (with start/end line bounds).
 * @param array  $lines     Original monolith lines (0-indexed).
 */
function rebundle(string $monolith, string $uiDir, string $dark, array $sections, array $lines): void
{
    // 1. Header: everything before the first component section's content.
    $headerEnd = !empty($sections) ? $sections[0]['start'] : count($lines);
    $out = '';
    for ($i = 0; $i < $headerEnd; $i++) {
        $out .= $lines[$i];
    }

    // 2. Component sections, rebuilt from per-component files.
    foreach ($sections as $sec) {
        $slug = $sec['slugs'][0];
        $file = $uiDir . '/' . $slug . '.css';
        $body = '';
        if (file_exists($file)) {
            $raw = file_get_contents($file);
            // Strip the leading comment header + @reference line.
            $raw = preg_replace('#^/\*.*?\*/\s*#s', '', $raw);
            $raw = preg_replace('#^\s*@reference\s+"[^"]*";\s*#', '', $raw);
            // Strip the @layer components { ... } wrapper (outermost).
            if (preg_match('#@layer\s+components\s*\{(.*)\}\s*$#s', $raw, $m)) {
                $body = trim($m[1]);
            } else {
                $body = trim($raw);
            }
        }
        if ($body === '') {
            // Fallback: keep the original section content verbatim.
            fwrite(STDERR, "WARNING: missing or empty $file — keeping original section\n");
            for ($i = $sec['start']; $i < $sec['end']; $i++) {
                $out .= $lines[$i];
            }
            continue;
        }
        if ($body !== '') {
            // Re-emit a clean section header comment block.
            $out .= "  /* ------------------------------------------------------- */\n";
            $out .= "  " . trim($sec['name']) . "\n";
            $out .= "  /* ------------------------------------------------------- */\n";
            $out .= $body . "\n\n";
        }
    }

    // 3. Utilities / dark block, regenerated from dark.css.
    $darkRaw = file_exists($dark) ? file_get_contents($dark) : '';
    $darkBody = '';
    if (preg_match('#@layer\s+utilities\s*\{(.*)\}\s*$#s', $darkRaw, $m)) {
        $darkBody = trim($m[1]);
    }
    $out .= "\n  /* ============================================================\n";
    $out .= "   * UTILITY LAYER\n";
    $out .= "   * ============================================================ */\n";
    $out .= "  @layer utilities {\n";
    $out .= $darkBody !== '' ? $darkBody . "\n" : '';
    $out .= "  }\n";
    $out .= "}\n";

    file_put_contents($monolith, $out);
}

// ---- Extract sections ----
// A section is defined by a comment block containing a line:
//   * NAME (slug1, slug2)
// The section content runs from the `*/` closing the header to the
// next `  /* -----` section separator.

$sections = [];
$totalLines = count($lines);

$i = 0;
while ($i < $totalLines) {
    $line = ln($i);

    // Match section header start: `  /* ----`
    if (preg_match('/^  \/\* -{10,}/', $line)) {
        // Scan forward in this comment block for `* NAME (slugs)`
        $headerEnd = -1;
        $nameLine  = '';
        $slugs     = [];

        for ($j = $i; $j < $totalLines && $j < $i + 20; $j++) {
            $hl = ln($j);
            // Match a real section header:  * BUTTON (btn)  or  * BUTTON (btn, btn-sm)
            // The NAME must be UPPERCASE words (not "Usage:"), and the slug list
            // must be the LAST parenthesized group on the line.
            if (empty($slugs) && preg_match('/^\s+\*\s+[A-Z][A-Z0-9 &-\/]*\(([a-z][a-z0-9\/-]*)/', $hl, $m)) {
                $nameLine = trim($hl);
                // Parse slug list — split on comma, strip whitespace
                $raw = str_replace('/', ',', $m[1]); // separator/divider → separator, divider
                $slugs = array_map('trim', explode(',', $raw));
                $slugs = array_filter($slugs, fn($s) => preg_match('/^[a-z][a-z0-9-]*$/', $s));
                $slugs = array_values($slugs);
            }
            // Slugless sub-component sections (e.g. "* MENU SUB-COMPONENTS")
            // get a derived slug so they are still extracted & rebundled.
            if (empty($slugs) && empty($nameLine) && preg_match('/^\s+\*\s+([A-Z][A-Z0-9 -]+)\s*$/', $hl, $m2)) {
                $nameLine = trim($hl);
                $slugs = [strtolower(str_replace(' ', '-', trim($m2[1])))];
            }
            // Closing line of the header comment: `   * ---...--- */`
            // Use a regex instead of exact string match — dash counts vary.
            // Only capture the FIRST closing (this section's own header).
            if ($headerEnd < 0 && preg_match('/^\s+\*\s+-{5,}\s*\*\/\s*$/', $hl)) {
                $headerEnd = $j + 1; // first line AFTER the header
            }
        }

        if (!empty($slugs) && $headerEnd > 0) {
            // This is a component section — content starts at $headerEnd
            // Find where the next section starts (next `  /* ----` line)
            $contentStart = $headerEnd;
            $contentEnd   = $totalLines;

            for ($k = $headerEnd; $k < $totalLines; $k++) {
                $nl = ln($k);
                // Stop at next component section separator
                if (preg_match('/^  \/\* -{10,}/', $nl) && $k > $i + 2) {
                    $contentEnd = $k;
                    break;
                }
                // Stop at the utility-layer marker or @layer utilities
                if (preg_match('/^  \/\* ={3,}/', $nl) || preg_match('/@layer utilities/', $nl)) {
                    $contentEnd = $k;
                    break;
                }
            }

            $content = '';
            for ($k = $contentStart; $k < $contentEnd; $k++) {
                $content .= $lines[$k]; // preserve original indentation
            }
            $content = trim($content);

            if (!empty($content)) {
                $sections[] = [
                    'slugs'   => $slugs,
                    'name'    => $nameLine,
                    'line'    => $i + 1,
                    'content' => $content,
                    'start'   => $contentStart,
                    'end'     => $contentEnd,
                ];
            }
        }
    }

    $i++;
}

// ---- (Optional) Rebundle: rebuild the monolith from per-component files ----
if ($REBUNDLE) {
    rebundle($MONOLITH, $UI_DIR, $DARK, $sections, $lines);
    echo "\n✓ Rebuilt monolith: $MONOLITH\n";
    echo "  Component sections were regenerated from stubs/ui/*.css\n";
    echo "  Header (@theme) and @layer utilities (dark.css) were preserved.\n";
    exit(0);
}

// ---- Write per-component CSS files ----
$written = [];
foreach ($sections as $sec) {
    $css = $sec['content'];
    $slug = $sec['slugs'][0];

    // Build a clean file header
    $header = sprintf(
        "/* ============================================================\n" .
        " * BlatUI Semantic — %s\n" .
        " * Auto-generated from semantic-base.css (line %d)\n" .
        " * ============================================================ */\n" .
        "\n" .
        "@reference \"tailwindcss\";\n" .
        "\n" .
        "@layer components {\n",
        $sec['name'],
        $sec['line']
    );

    // Indent content 2 more spaces inside @layer
    $indented = '';
    foreach (explode("\n", $css) as $cl) {
        $indented .= '  ' . $cl . "\n";
    }

    $footer = "}\n";

    $full = $header . $indented . $footer;

    $file = $UI_DIR . '/' . $slug . '.css';
    file_put_contents($file, $full);
    $written[] = $slug;

    // Write companion files for additional slugs (e.g. datetime-picker, time-field)
    for ($si = 1; $si < count($sec['slugs']); $si++) {
        $alias = $UI_DIR . '/' . $sec['slugs'][$si] . '.css';
        $aliasContent = sprintf(
            "/* ============================================================\n" .
            " * BlatUI Semantic — %s (alias for %s)\n" .
            " * Auto-generated from semantic-base.css (line %d)\n" .
            " * ============================================================ */\n" .
            "\n" .
            "@reference \"tailwindcss\";\n" .
            "@import \"./%s.css\";\n",
            $sec['name'],
            $slug,
            $sec['line'],
            $slug
        );
        file_put_contents($alias, $aliasContent);
        $written[] = $sec['slugs'][$si];
    }
}

echo "✓ Extracted " . count($written) . " per-component CSS files\n";
echo "  Components: " . implode(', ', array_slice($written, 0, 20)) . (count($written) > 20 ? ' …' : '') . "\n";

// ---- Update index.json with 'css' references ----
if (file_exists($INDEX)) {
    $json = json_decode(file_get_contents($INDEX), true);
    if ($json === null) {
        fwrite(STDERR, "WARNING: could not parse index.json — skipping update\n");
    } else {
        // index.json has a top-level "components" array
        if (!isset($json['components']) || !is_array($json['components'])) {
            fwrite(STDERR, "WARNING: index.json has no 'components' array — skipping update\n");
        } else {
            // Map index component names -> generated CSS slugs.
            // Only entries where the index "name" differs from the CSS slug are needed;
            // the default fallback is $cssSlug = $rename[$name] ?? $name.
            $rename = [
                // Top-level renames
                'button'            => 'btn',
                'breadcrumb'        => 'breadcrumbs',
                'separator'         => 'divider',
                'pagination'        => 'join-based',
                'dialog'            => 'modal',
                'command-dialog'    => 'command',
                'bottom-navigation' => 'navbar',
                'field-group'       => 'field',
                'description-item'  => 'description-list',
                'tree-node'         => 'tree',
                'tree-table-row'    => 'tree-table',
                'json-viewer-node'  => 'json-viewer',
                'org-chart-node'    => 'org-chart',
                'server-table'      => 'data-table',
                'dock-item'         => 'dock',
                'bento-item'        => 'bento-grid',
                'bottom-navigation-item' => 'bottom-navigation',

                // Sub-component -> parent CSS slug mappings
                'stepper-content'   => 'stepper',
                'stepper-description' => 'stepper',
                'stepper-indicator' => 'stepper',
                'stepper-item'      => 'stepper',
                'stepper-nav'       => 'stepper',
                'stepper-separator' => 'stepper',
                'stepper-title'     => 'stepper',
                'stepper-trigger'   => 'stepper',

                'menu-item'         => 'menu',
                'menu-label'        => 'menu',
                'menu-group'        => 'menu',
                'menu-separator'    => 'menu',
                'menu-shortcut'     => 'menu',
                'menu-checkbox-item' => 'menu',
                'menu-radio-item'   => 'menu',

                'accordion-item'    => 'accordion',
                'accordion-content' => 'accordion',
                'accordion-trigger' => 'accordion',

                'alert-action'      => 'alert',
                'alert-description' => 'alert',
                'alert-title'       => 'alert',

                'alert-dialog-action' => 'alert-dialog',
                'alert-dialog-cancel' => 'alert-dialog',
                'alert-dialog-content' => 'alert-dialog',
                'alert-dialog-description' => 'alert-dialog',
                'alert-dialog-footer' => 'alert-dialog',
                'alert-dialog-header' => 'alert-dialog',
                'alert-dialog-title' => 'alert-dialog',
                'alert-dialog-trigger' => 'alert-dialog',

                'button-group-separator' => 'button-group',
                'button-group-text' => 'button-group',

                'breadcrumb-ellipsis' => 'breadcrumbs',
                'breadcrumb-item'   => 'breadcrumbs',
                'breadcrumb-link'   => 'breadcrumbs',
                'breadcrumb-list'   => 'breadcrumbs',
                'breadcrumb-page'   => 'breadcrumbs',
                'breadcrumb-separator' => 'breadcrumbs',

                'card-action'       => 'card',
                'card-content'      => 'card',
                'card-description'  => 'card',
                'card-footer'       => 'card',
                'card-header'       => 'card',
                'card-title'        => 'card',

                'carousel-content'  => 'carousel',
                'carousel-item'     => 'carousel',
                'carousel-next'     => 'carousel',
                'carousel-previous' => 'carousel',

                'chart-container'   => 'chart',
                'chart-tooltip-content' => 'chart',

                'chat-message'      => 'chat',

                'avatar-fallback'   => 'avatar',
                'avatar-group'      => 'avatar',
                'avatar-image'      => 'avatar',

                'dropdown-menu-content' => 'dropdown-menu',
                'dropdown-menu-item' => 'dropdown-menu',
                'dropdown-menu-label' => 'dropdown-menu',
                'dropdown-menu-separator' => 'dropdown-menu',
                'dropdown-menu-shortcut' => 'dropdown-menu',
                'dropdown-menu-sub' => 'dropdown-menu',
                'dropdown-menu-sub-content' => 'dropdown-menu',
                'dropdown-menu-sub-trigger' => 'dropdown-menu',
                'dropdown-menu-trigger' => 'dropdown-menu',

                'command-empty'     => 'command',
                'command-group'     => 'command',
                'command-input'     => 'command',
                'command-item'      => 'command',
                'command-list'      => 'command',
                'command-separator' => 'command',
                'command-shortcut'  => 'command',

                'context-menu-content' => 'context-menu',
                'context-menu-item' => 'context-menu',
                'context-menu-label' => 'context-menu',
                'context-menu-separator' => 'context-menu',
                'context-menu-shortcut' => 'context-menu',
                'context-menu-sub' => 'context-menu',
                'context-menu-sub-content' => 'context-menu',
                'context-menu-sub-trigger' => 'context-menu',
                'context-menu-trigger' => 'context-menu',

                'hover-card-content' => 'hover-card',
                'hover-card-trigger' => 'hover-card',

                'menubar-content'   => 'menubar',
                'menubar-item'      => 'menubar',
                'menubar-label'     => 'menubar',
                'menubar-separator' => 'menubar',
                'menubar-shortcut'  => 'menubar',
                'menubar-sub'       => 'menubar',
                'menubar-sub-content' => 'menubar',
                'menubar-sub-trigger' => 'menubar',
                'menubar-trigger'   => 'menubar',

                'navigation-menu-content' => 'navigation-menu',
                'navigation-menu-indicator' => 'navigation-menu',
                'navigation-menu-item' => 'navigation-menu',
                'navigation-menu-link' => 'navigation-menu',
                'navigation-menu-list' => 'navigation-menu',
                'navigation-menu-trigger' => 'navigation-menu',
                'navigation-menu-viewport' => 'navigation-menu',

                'popover-content'   => 'popover',
                'popover-trigger'   => 'popover',

                'sheet-content'     => 'sheet',
                'sheet-description' => 'sheet',
                'sheet-footer'      => 'sheet',
                'sheet-header'      => 'sheet',
                'sheet-overlay'     => 'sheet',
                'sheet-title'       => 'sheet',
                'sheet-trigger'     => 'sheet',

                'tabs-content'      => 'tabs',
                'tabs-list'         => 'tabs',
                'tabs-trigger'      => 'tabs',

                'toast-action'      => 'toast',
                'toast-close'       => 'toast',
                'toast-description' => 'toast',
                'toast-provider'    => 'toast',
                'toast-title'       => 'toast',
                'toast-viewport'    => 'toast',

                'tooltip-content'   => 'tooltip',
                'tooltip-provider'  => 'tooltip',
                'tooltip-trigger'   => 'tooltip',

                'drawer-content'    => 'drawer',
                'drawer-description' => 'drawer',
                'drawer-footer'     => 'drawer',
                'drawer-header'     => 'drawer',
                'drawer-overlay'    => 'drawer',
                'drawer-title'      => 'drawer',
                'drawer-trigger'    => 'drawer',

                'modal-action'      => 'modal',
                'modal-body'        => 'modal',
                'modal-description' => 'modal',
                'modal-footer'      => 'modal',
                'modal-header'      => 'modal',
                'modal-title'       => 'modal',
                'modal-trigger'     => 'modal',

                'collapsible-content' => 'collapsible',
                'collapsible-trigger' => 'collapsible',

                'select-content'    => 'select',
                'select-group'      => 'select',
                'select-item'       => 'select',
                'select-label'      => 'select',
                'select-separator'  => 'select',
                'select-trigger'    => 'select',
                'select-value'      => 'select',

                'combobox-content'  => 'combobox',
                'combobox-empty'    => 'combobox',
                'combobox-group'    => 'combobox',
                'combobox-input'    => 'combobox',
                'combobox-item'     => 'combobox',
                'combobox-list'     => 'combobox',
                'combobox-separator' => 'combobox',
                'combobox-trigger'  => 'combobox',
            ];

            $updated = 0;
            foreach ($json['components'] as &$entry) {
                $name = $entry['name'] ?? '';
                $cssSlug = $rename[$name] ?? $name;

                if (in_array($cssSlug, $written, true) || file_exists($UI_DIR . '/' . $cssSlug . '.css')) {
                    $cssPath = 'ui/' . $cssSlug . '.css';
                    // Check whether this css path is already referenced
                    $has = false;
                    foreach ($entry['files'] ?? [] as $f) {
                        if (is_array($f) && ($f['path'] ?? null) === $cssPath) {
                            $has = true;
                            break;
                        }
                    }
                    if (!$has) {
                        $entry['files'][] = [
                            'path'   => $cssPath,
                            'type'   => 'registry:file',
                            'target' => 'resources/css/vendor/blatui/ui/' . $cssSlug . '.css',
                        ];
                        $updated++;
                    }
                }
            }
            unset($entry);

            file_put_contents($INDEX, json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n");
            echo "✓ Updated index.json: added css references to $updated component entries\n";
        }
    }
}

// ---- (Optional) Regenerate monolithic bundle ----
echo "\nDone. Per-component CSS files are in stubs/ui/*.css\n";
echo "You can now run: php artisan blatui:add <component> --registry=semantic\n";
echo "To rebuild the monolith from parts: php scripts/split-css.php --rebundle\n";
