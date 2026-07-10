@props(['text' => '', 'speed' => 50, 'loop' => false])

<span
    data-slot="typewriter"
    x-data="{ display: '', idx: 0 }"
    x-init="setInterval(() => { if(idx <= '{{ $text }}'.length) { display = '{{ $text }}'.substring(0, idx); idx++ } {{ $loop ? 'else { idx = 0 }' : '' } }, {{ $speed }})"
    x-text="display"
    {{ $attributes->merge(['class' => 'typewriter']) }}
><span class="animate-pulse">▊</span></span>
