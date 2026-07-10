@props(['text' => '', 'duration' => 50])

<span
    data-slot="text-reveal"
    x-data="{ idx: 0 }"
    x-init="setInterval(() => { if(idx < '{{ $text }}'.length) idx++ }, {{ $duration }})"
    x-text="'{{ $text }}'.substring(0, idx)"
    {{ $attributes->merge(['class' => 'text-reveal']) }}
></span>
