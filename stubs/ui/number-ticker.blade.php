@props(['value' => 0, 'duration' => 2000])

<span
    data-slot="number-ticker"
    x-data="{ val: 0 }"
    x-init="let start = 0, end = {{ $value }}, startTime = new Date(); function tick() { const elapsed = new Date() - startTime; const progress = Math.min(elapsed / {{ $duration }}, 1); val = Math.floor(progress * (end - start) + start); if(progress < 1) requestAnimationFrame(tick); }; requestAnimationFrame(tick)"
    x-text="val.toLocaleString()"
    {{ $attributes->merge(['class' => 'number-ticker font-mono tabular-nums']) }}
></span>
