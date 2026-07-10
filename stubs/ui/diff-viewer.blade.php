@props(['old' => '', 'new' => '', 'language' => 'diff'])

<div data-slot="diff-viewer" {{ $attributes->merge(['class' => 'diff-viewer rounded-box border border-base-300 overflow-hidden']) }}>
    <div class="mockup-code">
        @php
            $oldLines = explode("\n", $old);
            $newLines = explode("\n", $new);
            $max = max(count($oldLines), count($newLines));
        @endphp
        @for($i = 0; $i < $max; $i++)
            @php
                $oldLine = $oldLines[$i] ?? null;
                $newLine = $newLines[$i] ?? null;
                $cls = 'text-base-content';
                if($oldLine !== null && ($newLine === null || $oldLine !== $newLine)) $cls = 'text-error';
                if($newLine !== null && ($oldLine === null || $oldLine !== $newLine)) $cls = 'text-success';
            @endphp
            <pre class="{{ $cls }}"><code>{{ $oldLine ?? '' }} {{ $newLine ?? '' }}</code></pre>
        @endfor
        {{ $slot }}
    </div>
</div>
