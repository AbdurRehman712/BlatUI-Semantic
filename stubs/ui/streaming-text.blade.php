@props(['text' => '', 'speed' => 30])

<span
    data-slot="streaming-text"
    x-data="{ displayed: '', idx: 0 }"
    x-init="setInterval(() => { if(idx < '{{ $text }}'.length) { displayed += '{{ $text }}'[idx]; idx++ } }, {{ $speed }})"
    x-text="displayed + (idx < '{{ $text }}'.length ? '▊' : '')"
    {{ $attributes->merge(['class' => 'streaming-text font-mono']) }}
></span>
