# BlatUI Semantic — FlyonUI-Inspired Component Registry

A third-party **semantic component registry** for [BlatUI](https://github.com/remix-ui/blat-ui), providing pure-semantic Blade components powered by **Tailwind CSS v4** and **Alpine.js** — inspired by the [FlyonUI](https://flyonui.com/) philosophy.

Instead of exposing utility class strings in your Blade templates, you write clean, readable **semantic class hooks** like:

```blade
<x-ui.button variant="primary" size="lg">Save</x-ui.button>
<x-ui.badge variant="success">Active</x-ui.badge>
<x-ui.card title="Welcome" shadow>
    <p>Content here</p>
</x-ui.card>
```

These render as `class="btn btn-primary btn-lg"`, `class="badge badge-success"`, and `class="card card-shadow"` respectively — keeping your templates clean and your design system consistent.

## Motivation

- **daisyUI** pioneered the idea of pure-CSS semantic component libraries for Tailwind CSS.
- **FlyonUI** modernized it by embedding Alpine.js for headless-JS-powered interactivity (dropdowns, modals, popovers, drawers, etc.).
- **BlatUI** brings the shadcn-style CLI workflow to Laravel, letting developers pull components on demand.

This registry bridges all three: you get FlyonUI's semantic class naming, Alpine.js interactivity for stateful components, and BlatUI's install-anywhere CLI workflow.

## Registry Contents

### Core Components (45+)

| Component | Semantic Class | Alpine.js |
|-----------|---------------|-----------|
| [Button](#button) | `btn`, `btn-{variant}`, `btn-{size}` | ❌ |
| [Badge](#badge) | `badge`, `badge-{variant}`, `badge-{size}` | ❌ |
| [Alert](#alert) | `alert`, `alert-{variant}` | ❌ |
| [Card](#card) | `card`, `card-body`, `card-title` | ❌ |
| [Input](#input) | `input`, `input-{variant}`, `input-{size}` | ❌ |
| [Textarea](#textarea) | `textarea`, `textarea-{variant}` | ❌ |
| [Select](#select) | `select`, `select-{variant}` | ❌ |
| [Checkbox](#checkbox) | `checkbox`, `checkbox-{variant}` | ❌ |
| [Radio](#radio) | `radio`, `radio-{variant}` | ❌ |
| [Toggle](#toggle) | `toggle`, `toggle-{variant}` | ❌ |
| [Label](#label) | `label`, `label-text` | ❌ |
| [Avatar](#avatar) | `avatar`, `avatar-{size}` | ❌ |
| [Breadcrumb](#breadcrumb) | `breadcrumbs` | ❌ |
| [Tooltip](#tooltip) | `tooltip`, `tooltip-{position}` | ❌ |
| [Table](#table) | `table`, `table-zebra` | ❌ |
| [Progress](#progress) | `progress`, `progress-{variant}` | ❌ |
| [Skeleton](#skeleton) | `skeleton` | ❌ |
| [Separator](#separator) | `divider` | ❌ |
| [Pagination](#pagination) | `pagination` | ❌ |
| [Link](#link) | `link`, `link-{variant}` | ❌ |
| [KBD](#kbd) | `kbd`, `kbd-{size}` | ❌ |
| [Stack](#stack) | `stack` | ❌ |
| [Footer](#footer) | `footer` | ❌ |
| [Stat](#stat) | `stat`, `stat-title`, `stat-value` | ❌ |
| [Rating](#rating) | `rating` | ❌ |
| [Chat](#chat) | `chat`, `chat-bubble` | ❌ |
| [Indicator](#indicator) | `indicator`, `indicator-item` | ❌ |
| [Join](#join) | `join` | ❌ |
| [Steps](#steps) | `steps`, `step` | ❌ |
| [Timeline](#timeline) | `timeline` | ❌ |
| [Menu](#menu) | `menu`, `menu-item` | ✅ |
| [Navbar](#navbar) | `navbar` | ❌ |
| [Carousel](#carousel) | `carousel` | ✅ |
| [Dropdown](#dropdown) | `dropdown` | ✅ |
| [Modal](#modal) | `modal`, `modal-box` | ✅ |
| [Sheet](#sheet) | `drawer` | ✅ |
| [Tabs](#tabs) | `tabs`, `tab` | ✅ |
| [Accordion](#accordion) | `collapse`, `collapse-title` | ✅ |
| [Popover](#popover) | `dropdown` | ✅ |
| [Toast](#toast) | `toast`, `alert` | ✅ |
| [Drawer](#drawer) | `drawer` | ✅ |
| [Swap](#swap) | `swap`, `swap-on`, `swap-off` | ✅ |
| [Countdown](#countdown) | `countdown` | ✅ |
| [File Input](#file-input) | `file-input` | ❌ |
| [Fieldset](#fieldset) | `fieldset` | ❌ |

## Quick Start

### 1. Install BlatUI CLI

```bash
composer require remix-ui/blat-ui
php artisan blatui:install
```

### 2. Add This Registry

Edit `config/blatui.php` and add this registry URL:

```php
'registries' => [
    'default' => 'https://blatui.remix-it.com/registry',
    'semantic' => 'https://raw.githubusercontent.com/remix-ui/blatui-semantic/main/index.json',
],
```

### 3. Install Components

```bash
php artisan blatui:add button --registry=semantic
php artisan blatui:add card --registry=semantic
php artisan blatui:add modal --registry=semantic
php artisan blatui:add dropdown --registry=semantic
```

### 4. Install the CSS — Choose Your Tier

BlatUI Semantic offers **three tiers** of CSS delivery so you only ship the styles you actually use. The tradeoffs are explained in Architecture & Performance below.

| Tier | What you import | Best for | Output size (gzip est.) |
|------|-----------------|----------|------------------------|
| **① Tokens Only** | `tokens.css` (~2 KB) | Custom components, utility-only | ~2 KB |
| **② Selective** | `tokens.css` + individual `ui/<comp>.css` | Selective installs (shadcn-style) | ~3-15 KB |
| **③ Full Bundle** | `semantic-base.css` (~75 KB full) | Prototyping, full app, monolith | ~15-25 KB gzipped |

#### Tier ① — Design tokens only (minimal, you write the markup)

Use when you want BlatUI's color palette and design tokens, but write your own semantic or utility-based markup:

```css
/* resources/css/app.css */
@import "tailwindcss";
@import "vendor/blatui/tokens.css";

/* Your custom styles using theme variables */
@layer components {
  .my-custom-btn {
    background: var(--color-primary);
    color: var(--color-primary-foreground);
    border-radius: var(--radius-md);
  }
}
```

#### Tier ② — Component-level CSS (future-proof, recommended)

Co-locate CSS with each component you install. Every `php artisan blatui:add` copies both the Blade stub AND its `.css` file:

```bash
# Install a component — CSS is copied alongside
php artisan blatui:add button --registry=semantic
php artisan blatui:add card --registry=semantic
```

Then import just the ones you need:

```css
/* resources/css/app.css */
@import "tailwindcss";
@import "vendor/blatui/tokens.css";
@import "vendor/blatui/ui/btn.css";
@import "vendor/blatui/ui/card.css";
@import "vendor/blatui/ui/modal.css";

/* Dark mode (optional) */
.dark @import "vendor/blatui/dark.css";
```

Tailwind v4's content-based purging automatically removes any unused classes from these files.

#### Tier ③ — Full bundle (quick start, prototyping)

For new projects or prototyping where you want everything available:

```bash
cp stubs/semantic-base.css resources/css/
```

```css
@import "tailwindcss";
@import "./semantic-base.css";

/* Override design tokens */
@theme {
    --color-primary: #6366f1;
}
```

### 5. Install Alpine.js

Components with interactive behavior (dropdown, modal, sheet, tabs, accordion, popover, toast, drawer, swap, countdown, carousel, collapsible menus) require Alpine.js:

```bash
composer require ryangjchandler/alpine-laravel
```

Or add the CDN script to your layout:

```blade
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
```

For Laravel with Vite:

```bash
npm install alpinejs
```

Then in your `resources/js/app.js`:

```js
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();
```

## Component Usage

### Button

```blade
{{-- Variants --}}
<x-ui.button variant="primary">Primary</x-ui.button>
<x-ui.button variant="secondary">Secondary</x-ui.button>
<x-ui.button variant="accent">Accent</x-ui.button>
<x-ui.button variant="neutral">Neutral</x-ui.button>
<x-ui.button variant="info">Info</x-ui.button>
<x-ui.button variant="success">Success</x-ui.button>
<x-ui.button variant="warning">Warning</x-ui.button>
<x-ui.button variant="error">Error</x-ui.button>
<x-ui.button variant="ghost">Ghost</x-ui.button>
<x-ui.button variant="outline">Outline</x-ui.button>
<x-ui.button variant="link">Link</x-ui.button>
<x-ui.button variant="soft">Soft</x-ui.button>
<x-ui.button variant="dash">Dashed</x-ui.button>

{{-- Sizes --}}
<x-ui.button size="xs">X-Small</x-ui.button>
<x-ui.button size="sm">Small</x-ui.button>
<x-ui.button size="md">Medium</x-ui.button>
<x-ui.button size="lg">Large</x-ui.button>
<x-ui.button size="xl">X-Large</x-ui.button>

{{-- Shapes --}}
<x-ui.button shape="circle">+</x-ui.button>
<x-ui.button shape="square">☰</x-ui.button>

{{-- Width modifiers --}}
<x-ui.button block>Full Width</x-ui.button>
<x-ui.button wide>Wide Button</x-ui.button>

{{-- States --}}
<x-ui.button :active="true">Active</x-ui.button>
<x-ui.button :loading="true">Loading...</x-ui.button>
<x-ui.button :disabled="true">Disabled</x-ui.button>

{{-- As link --}}
<a href="{{ route('home') }}" class="btn btn-primary">Home</a>
```

### Badge

```blade
{{-- Variants --}}
<x-ui.badge variant="primary">Primary</x-ui.badge>
<x-ui.badge variant="secondary">Secondary</x-ui.badge>
<x-ui.badge variant="success">Success</x-ui.badge>
<x-ui.badge variant="warning">Warning</x-ui.badge>
<x-ui.badge variant="error">Error</x-ui.badge>
<x-ui.badge variant="info">Info</x-ui.badge>
<x-ui.badge variant="outline">Outline</x-ui.badge>
<x-ui.badge variant="ghost">Ghost</x-ui.badge>
<x-ui.badge variant="soft">Soft</x-ui.badge>

{{-- Sizes --}}
<x-ui.badge size="xs">Tiny</x-ui.badge>
<x-ui.badge size="sm">Small</x-ui.badge>
<x-ui.badge size="md">Medium</x-ui.badge>
<x-ui.badge size="lg">Large</x-ui.badge>
<x-ui.badge size="xl">X-Large</x-ui.badge>
```

### Alert

```blade
<x-ui.alert variant="info" title="Heads up!" description="Your session expires in 5 minutes." />
<x-ui.alert variant="success" title="Well done!">
    Your profile has been updated successfully.
</x-ui.alert>

<x-ui.alert variant="warning" :icon="false">
    @slot('title') Warning @endslot
    Please verify your email address.
    @slot('actions')
        <x-ui.button variant="outline" size="sm">Dismiss</x-ui.button>
    @endslot
</x-ui.alert>

<x-ui.alert variant="error" outline>This is an outlined error alert.</x-ui.alert>
```

### Card

```blade
{{-- Basic --}}
<x-ui.card title="Card Title">
    This is the card content area.
</x-ui.card>

{{-- With image --}}
<x-ui.card title="Mountain View" image="/images/mountain.jpg" shadow>
    <p>Beautiful mountain scenery.</p>
    @slot('actions')
        <x-ui.button variant="primary" size="sm">View</x-ui.button>
        <x-ui.button variant="ghost" size="sm">Share</x-ui.button>
    @endslot
</x-ui.card>

{{-- Side layout --}}
<x-ui.card title="Horizontal" side image="/images/thumb.jpg">
    Content beside the image.
</x-ui.card>

{{-- With header/footer --}}
<x-ui.card>
    @slot('header') Top Section @endslot
    Main content here.
    @slot('footer') Bottom Actions @endslot
</x-ui.card>

{{-- Compact --}}
<x-ui.card title="Compact Card" compact bordered>
    Less padding version.
</x-ui.card>
```

### Dropdown (Alpine.js)

```blade
<x-ui.dropdown label="Actions" align="end">
    <a href="#" class="block px-4 py-2 hover:bg-muted">Profile</a>
    <a href="#" class="block px-4 py-2 hover:bg-muted">Settings</a>
    <hr class="border-border my-1">
    <a href="#" class="block px-4 py-2 text-error">Sign Out</a>
</x-ui.dropdown>

{{-- With custom trigger --}}
<x-ui.dropdown>
    @slot('trigger')
        <x-ui.button variant="ghost" shape="circle">
            <svg class="size-5" ...>...</svg>
        </x-ui.button>
    @endslot
    <div class="menu">...</div>
</x-ui.dropdown>
```

### Modal (Alpine.js)

```blade
<x-ui.modal title="Confirm Deletion">
    @slot('trigger')
        <x-ui.button variant="error">Delete</x-ui.button>
    @endslot
    
    <p>Are you sure you want to delete this item? This action cannot be undone.</p>

    @slot('actions')
        <x-ui.button variant="ghost" @click="open = false">Cancel</x-ui.button>
        <x-ui.button variant="error">Delete</x-ui.button>
    @endslot
</x-ui.modal>
```

### Sheet / Off-canvas (Alpine.js)

```blade
<x-ui.sheet title="Settings" position="right" size="lg">
    @slot('trigger')
        <x-ui.button variant="ghost">Open Settings</x-ui.button>
    @endslot

    <div class="space-y-4">
        <x-ui.fieldset legend="Notifications">
            <x-ui.toggle name="email" label="Email notifications" />
            <x-ui.toggle name="sms" label="SMS alerts" />
        </x-ui.fieldset>
    </div>
</x-ui.sheet>
```

### Tabs (Alpine.js)

```blade
<x-ui.tabs variant="boxed" default="tab1">
    @slot('tablist')
        <x-ui.tab-item label="Details" value="tab1" active />
        <x-ui.tab-item label="Shipping" value="tab2" />
        <x-ui.tab-item label="Returns" value="tab3" disabled />
    @endslot

    <div class="mt-4">
        <div x-show="activeTab === 'tab1'">Details content...</div>
        <div x-show="activeTab === 'tab2'">Shipping content...</div>
    </div>
</x-ui.tabs>
```

### Accordion (Alpine.js)

```blade
<x-ui.accordion>
    <x-ui.accordion-item title="What is BlatUI?">
        BlatUI is a shadcn-style component CLI for Laravel.
    </x-ui.accordion-item>
    <x-ui.accordion-item title="Is Alpine.js required?" :open="true">
        Only for interactive components (dropdown, modal, tabs, etc.).
    </x-ui.accordion-item>
    <x-ui.accordion-item title="Can I customize the theme?">
        Yes! Override CSS variables in your @theme block.
    </x-ui.accordion-item>
</x-ui.accordion>
```

### Drawer (Alpine.js)

```blade
<x-ui.drawer title="Navigation">
    @slot('trigger')
        <x-ui.button variant="ghost" shape="square">
            <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </x-ui.button>
    @endslot

    <x-ui.menu>
        <li class="menu-title">Main</li>
        <x-ui.menu-item title="Dashboard" href="#" :active="true" icon="..." />
        <x-ui.menu-item title="Analytics" href="#" icon="..." badge="New" />
        <x-ui.menu-item title="Settings" href="#" collapsible>
            <x-ui.menu-item title="Profile" href="#" />
            <x-ui.menu-item title="Security" href="#" />
        </x-ui.menu-item>
    </x-ui.menu>
</x-ui.drawer>
```

### Form Components

```blade
{{-- Input --}}
<x-ui.fieldset legend="Full Name" help="Enter your legal name">
    <x-ui.input name="name" placeholder="John Doe" />
</x-ui.fieldset>

{{-- Input with variant and size --}}
<x-ui.input variant="info" size="lg" placeholder="Search..." />

{{-- Textarea --}}
<x-ui.textarea name="bio" rows="5" placeholder="Tell us about yourself" />

{{-- Select --}}
<x-ui.select
    name="country"
    :options="['us' => 'United States', 'ca' => 'Canada', 'mx' => 'Mexico']"
    :selected="old('country', 'us')"
    includeEmpty
/>

{{-- Checkbox --}}
<x-ui.checkbox name="terms" label="I agree to the terms and conditions" />

{{-- Radio Group --}}
<x-ui.radio name="plan" value="free" label="Free Plan" />
<x-ui.radio name="plan" value="pro" label="Pro Plan" :checked="true" />

{{-- Toggle --}}
<x-ui.toggle name="notifications" label="Enable notifications" />

{{-- File Input --}}
<x-ui.file-input name="avatar" accept="image/*" variant="primary" />
```

### Data Display

```blade
{{-- Table --}}
<x-ui.table zebra :pinRows="true">
    @slot('header')
        <tr><th>Name</th><th>Email</th><th>Role</th></tr>
    @endslot
    <tr><td>John Doe</td><td>john@example.com</td><td>Admin</td></tr>
    <tr><td>Jane Smith</td><td>jane@example.com</td><td>User</td></tr>
</x-ui.table>

{{-- Pagination --}}
<x-ui.pagination :current="1" :total="10" />

{{-- Badge in notifications --}}
<x-ui.indicator position="top-end">
    @slot('item')
        <x-ui.badge variant="error" size="xs">3</x-ui.badge>
    @endslot
    <x-ui.button variant="ghost" shape="circle">
        <svg class="size-5" ...>...</svg>
    </x-ui.button>
</x-ui.indicator>

{{-- Progress --}}
<x-ui.progress variant="success" :value="75" size="lg" label="Completion" />

{{-- Skeleton loading --}}
<x-ui.skeleton width="100%" height="1rem" />
<x-ui.skeleton circle width="3rem" height="3rem" />
```

### Navigation

```blade
{{-- Navbar --}}
<x-ui.navbar :sticky="true">
    @slot('start')
        <span class="text-lg font-bold">Acme Corp</span>
    @endslot
    @slot('center')
        <x-ui.menu horizontal>
            <x-ui.menu-item title="Home" href="#" />
            <x-ui.menu-item title="Products" href="#" />
            <x-ui.menu-item title="About" href="#" />
        </x-ui.menu>
    @endslot
    @slot('end')
        <x-ui.avatar size="sm" src="/avatars/user.jpg" online />
    @endslot
</x-ui.navbar>

{{-- Breadcrumbs --}}
<x-ui.breadcrumb>
    <li><a href="/">Home</a></li>
    <li><a href="/products">Products</a></li>
    <li class="breadcrumbs-active">Current Page</li>
</x-ui.breadcrumb>

{{-- Steps --}}
<x-ui.steps>
    <x-ui.step variant="primary" label="Cart" completed />
    <x-ui.step variant="primary" label="Shipping" completed />
    <x-ui.step variant="primary" label="Payment" active />
    <x-ui.step label="Confirmation" />
</x-ui.steps>

{{-- Pagination (full) --}}
<x-ui.pagination :current="3" :total="25" />
```

### Tooltips

```blade
{{-- Tooltip wrapper --}}
<x-ui.tooltip text="This is a tooltip" position="top">
    <x-ui.button variant="outline">Hover me</x-ui.button>
</x-ui.tooltip>

{{-- Or use raw semantic classes --}}
<button class="tooltip tooltip-primary" data-tip="Save changes">
    Save
</button>
```

### Toast Notifications

```blade
<x-ui.toast position="top-end">
    <x-ui.toast-item variant="success" :duration="5000">
        <span>Profile updated successfully!</span>
    </x-ui.toast-item>
    <x-ui.toast-item variant="error" :dismissible="true">
        <span>Connection lost. Retrying...</span>
    </x-ui.toast-item>
</x-ui.toast>
```

### Other Components

```blade
{{-- KBD keystroke --}}
<p>Press <x-ui.kbd>Ctrl</x-ui.kbd> + <x-ui.kbd>K</x-ui.kbd> to search</p>

{{-- Link --}}
<x-ui.link href="https://example.com" variant="primary" hover>Learn more</x-ui.link>

{{-- Separator --}}
<x-ui.separator label="OR" />
<x-ui.separator variant="primary" />

{{-- Chat --}}
<x-ui.chat position="end" image="/avatars/me.jpg" header="You" footer="2 min ago" variant="primary">
    Hey, how are you?
</x-ui.chat>

{{-- Rating --}}
<x-ui.rating :value="4" :count="5" size="md" />

{{-- Stat --}}
<x-ui.stat title="Revenue" value="$45,200" desc="↑ 12.5% from last month">
    @slot('figure')💰@endslot
</x-ui.stat>

{{-- Swap --}}
<x-ui.swap effect="rotate">
    @slot('on') ☀️ @endslot
    @slot('off') 🌙 @endslot
</x-ui.swap>

{{-- Countdown --}}
<x-ui.countdown :days="2" :hours="14" :minutes="30" :seconds="0" running />

{{-- Stack --}}
<x-ui.stack>
    <div class="p-4 bg-card border rounded-xl">Layer 1</div>
    <div class="p-4 bg-card border rounded-xl">Layer 2</div>
    <div class="p-4 bg-card border rounded-xl">Layer 3</div>
</x-ui.stack>

{{-- Join (button group) --}}
<x-ui.join>
    <x-ui.button variant="outline" size="sm">1</x-ui.button>
    <x-ui.button variant="primary" size="sm">2</x-ui.button>
    <x-ui.button variant="outline" size="sm">3</x-ui.button>
</x-ui.join>
```

## Theming & Customization

### Design Tokens

Override any CSS variable from `semantic-base.css` in your own `@theme` block:

```css
@import "tailwindcss";
@import "./semantic-base.css";

@theme {
    /* Brand colors */
    --color-primary: #6366f1;
    --color-primary-foreground: #ffffff;

    /* Surfaces */
    --color-background: #fafafa;
    --color-foreground: #111827;
    --color-muted: #f3f4f6;

    /* Borders */
    --color-border: #e5e7eb;
    --color-input: #d1d5db;

    /* Radius */
    --radius-md: 0.5rem;
    --radius-lg: 0.75rem;
    --radius-xl: 1rem;
}
```

### Dark Mode

The semantic-base.css includes dark-mode-aware overrides using the `.dark` class:

```html
<html class="dark">
```

For Tailwind v4 dark mode strategy, configure in your CSS:

```css
@import "tailwindcss";
@custom-variant dark (&:where(.dark, [data-theme="dark"] *));
```

### Custom Components

To extend the semantic system with your own components:

```css
@layer components {
    .my-custom {
        @apply flex items-center gap-2 p-4 rounded-xl bg-primary text-primary-foreground;
    }
}
```

## CSS Delivery Architecture & Performance

BlatUI Semantic ships with a **three-tier CSS architecture** designed to eliminate unused CSS bloat while keeping the developer experience simple.

### The Problem

A monolithic 6,100-line `semantic-base.css` covering ~180 component families is wasteful when you only install 3-5 components. Importing the whole file:
- Adds ~75 KB (uncompressed) to your build, even if you use `<select>` but not `<dialog>`
- Delays initial CSS processing time (though Tailwind v4 purging mitigates the final bundle)
- Violates the "copy only what you use" spirit of the shadcn/BlatUI model

### How It Works (3-Tier Strategy)

```
┌─────────────────────────────────────────────────────────────┐
│  app.css (user's main CSS) — @import "tailwindcss" first    │
│                                                             │
│  Tier ①:  + tokens.css          (~2 KB)  — always          │
│  Tier ②:  + ui/btn.css          (~3 KB)  — per component   │
│            + ui/card.css         (~4 KB)     installed via  │
│            + ui/modal.css        (~2 KB)     blatui:add     │
│  Tier ③:  + semantic-base.css  (~75 KB)  — everything at   │
│                                               once          │
└─────────────────────────────────────────────────────────────┘
```

**Tier ① — Design Tokens (`tokens.css`)**

Extracts only the `@theme { ... }` block (~2 KB, 86 CSS custom properties). Imported on every page — it defines your brand colors, surface colors, and border radii. This is **always needed** and intentionally kept tiny.

**Tier ② — Per-Component CSS (`stubs/ui/<component>.css`)**

Each component has its own `.css` file co-located with its Blade stub. The file uses `@reference "tailwindcss"` so IDEs and Tailwind understand it, and wraps rules in `@layer components { ... }` so Tailwind v4's content-based purging applies:

```css
/* stubs/ui/btn.css */
@reference "tailwindcss";

@layer components {
  .btn { ... }
  .btn-primary { ... }
  /* ~3 KB of rules, fully purged if imported but unused */
}
```

When you run `php artisan blatui:add button`, it copies **both** `stubs/ui/button.blade.php` and `stubs/ui/btn.css` into your project. Only installed components ship CSS.

**Tier ③ — Full Monolith (`semantic-base.css`)**

The 6,100-line convenience bundle. Still automatically purged by Tailwind v4 (unused components are stripped from the final build), but you pay the parse cost. Recommended for prototyping or apps using 40+ components.

### Automated Generation

The `scripts/split-css.php` script reads `semantic-base.css`, splits it at each component section header, and writes individual `stubs/ui/<component>.css` files. It also updates `index.json` with the `files[]` references:

```bash
# Regenerate all per-component CSS files after updating semantic-base.css
php scripts/split-css.php
```

This keeps the monolith (Tier ③) as the source of truth while auto-generating the selective files (Tier ②). Both stay in sync.

### Comparison: daisyUI, FlyonUI, and Filament

| Approach | Delivery model | CSS bloat solution | Portability |
|----------|---------------|-------------------|-------------|
| **daisyUI v5** | Tailwind plugin (npm) | No built-in component selection; use `@layer` purging | Works in any Tailwind v4 project |
| **FlyonUI** | npm package + CDN | Monolithic CSS file; user picks from CDN or uses Tailwind plugin | Requires specific Tailwind config |
| **Filament v3/v4** | Compiled PHP package asset | Ships compiled bundle; purging via custom Tailwind build with content paths | Laravel-only, package model |
| **BlatUI (this)** | **Copy-in stubs + CSS** | **Per-component co-located CSS** with Tailwind v4 purging | Any Laravel/Tailwind v4 project |

**Key Insight**: Filament and daisyUI follow a *package-dependency* model — you install a dependency and it ships compiled assets or registers a Tailwind plugin. BlatUI follows a *copy-in* (shadcn) model — you own the source. The per-component CSS architecture maps naturally to copy-in: each component you install brings exactly its own CSS, no more.

Filament v4 notably aligned with FlyonUI's design language but kept its compiled-bundle delivery (a sensible choice for an admin panel where you use most widgets). For BlatUI's selective-install model, the per-component approach is the superior fit.

### Tailwind v4 Purging: How It Helps

When you import per-component CSS files through your `app.css` (which processes through Tailwind), Tailwind v4 scans your Blade files for class names and *strips any `@layer components` rule not referenced in your templates*. This means even Tier ② imports are safe — unused classes are eliminated automatically.

To ensure dynamic class names (built from variables) are not accidentally purged, add `@source inline` hints:

```css
@source inline("btn-*");  /* Safelist all btn-size classes */
```

### Dark Mode

Dark mode overrides are split into a separate `stubs/dark.css` file. Tier ② users import it conditionally:

```css
/* app.css */
.dark @import "vendor/blatui/dark.css";
```

Tier ③ users get dark mode automatically included in `semantic-base.css`.

## File Structure

```
blatui-semantic/
├── index.json                  # Main registry index (shadcn-compatible)
├── README.md                   # This documentation
├── scripts/
│   └── split-css.php           # Auto-generates per-component CSS from monolith
└── stubs/
    ├── semantic-base.css       # Full convenience bundle (~6,100 lines, Tier ③)
    ├── tokens.css               # Design tokens only (@theme, ~2 KB, Tier ①)
    ├── dark.css                 # Dark mode overrides (separate, for Tier ② users)
    └── ui/                     # Blade stubs + co-located per-component CSS files
        ├── button.blade.php    # Blade template
        ├── btn.css             # Component CSS (Tier ②)
        ├── badge.blade.php
        ├── badge.css
        ├── alert.blade.php
        ├── alert.css
        ├── card.blade.php
        ├── card.css
        ├── input.blade.php
        ├── input.css
        ├── textarea.blade.php
        ├── select.blade.php
        ├── select.css
        ├── checkbox.blade.php
        ├── checkbox.css
        ├── radio.blade.php
        ├── toggle.blade.php
        ├── label.blade.php
        ├── avatar.blade.php
        ├── breadcrumb.blade.php
        ├── dropdown.blade.php       # Alpine.js
        ├── modal.blade.php          # Alpine.js
        ├── modal.css
        ├── drawer.blade.php         # Alpine.js
        ├── drawer.css
        └── ... (180+ component families with CSS)
```

## Regenerating Per-Component CSS

After modifying `semantic-base.css`, regenerate the per-component CSS files:

```bash
php scripts/split-css.php
```

This reads `semantic-base.css`, splits it at each `* NAME (slug)` section header, and writes standalone `stubs/ui/<slug>.css` files wrapped in `@layer components`. It also updates `index.json` with CSS file references.

## Contributing

1. Fork this repository
2. Create a component stub in `stubs/ui/<name>.blade.php` following the existing patterns
3. Add the component's CSS rules to `stubs/semantic-base.css` (the source of truth)
4. Run `php scripts/split-css.php` to regenerate the per-component CSS file
5. Add the component metadata to `index.json` (the `css` field will be added automatically)
6. Open a Pull Request

### Naming Conventions

- **Props** — use `$camelCase` with defaults that match the component's role
- **Semantic classes** — always use `component-{variant}-{modifier}` pattern (e.g., `btn-primary`, `input-sm`, `card-bordered`)
- **Alpine.js interactivity** — use `x-data`, `x-show`, `x-on:click` for state; avoid jQuery or vanilla JS
- **Attribute merging** — always use `{{ $attributes->merge(['class' => ...]) }}` for Laravel compatibility

## Component Design Principles

1. **Zero utility classes in Blade files** — All styling is behind semantic CSS classes defined in `semantic-base.css` (or per-component CSS files)
2. **Clean, readable templates** — Template syntax should express *what* the component is, not *how* it looks
3. **Co-located CSS** — Each component has its own `.css` file in `stubs/ui/`, auto-generated from the monolithic `semantic-base.css` via `scripts/split-css.php`
4. **Progressive enhancement** — Core functionality works without JS; Alpine.js enhances the experience
5. **Laravel-native** — Uses `@props`, `$attributes->merge()`, `{{ $slot }}`, named slots
6. **Tailwind v4 compatible** — Uses `@theme`, `@layer`, `@reference`, CSS-first configuration

## License

MIT — See [LICENSE](LICENSE) for details.

## Related

- [BlatUI](https://github.com/remix-ui/blat-ui) — The Laravel shadcn-style CLI
- [FlyonUI](https://flyonui.com/) — The semantic component library that inspired this registry
- [daisyUI](https://daisyui.com/) — The original pure-CSS semantic component library
- [shadcn/ui](https://ui.shadcn.com/) — The registry pattern this follows
