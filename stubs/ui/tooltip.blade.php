@props([
    'text' => null,
    'position' => 'top',
    'variant' => null,
    'open' => false,
])

@php
    $classes = 'tooltip';

    if ($position !== 'top') {
        $classes .= " tooltip-{$position}";
    }

    if ($variant) {
        $classes .= " tooltip-{$variant}";
    }

    if ($open) {
        $classes .= ' tooltip-open';
    }
@endphp

<div data-slot="tooltip" {{ $attributes->merge(['class' => $classes]) }}>
    @if($text)
        <span class="tooltip-content">{{ $slot }}</span>
    @else
        {{ $slot }}
    @endif
</div>
