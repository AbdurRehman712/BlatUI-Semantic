@props([
    'position' => 'top-end',      // top-start, top-center, top-end, middle-start, middle-center, middle-end, bottom-start, bottom-center, bottom-end
    'item' => null,
])

@php
    $classes = 'indicator';

    $positions = [
        'top-start' => 'indicator-top indicator-start',
        'top-center' => 'indicator-top indicator-center',
        'top-end' => 'indicator-top indicator-end',
        'middle-start' => 'indicator-middle indicator-start',
        'middle-center' => 'indicator-middle indicator-center',
        'middle-end' => 'indicator-middle indicator-end',
        'bottom-start' => 'indicator-bottom indicator-start',
        'bottom-center' => 'indicator-bottom indicator-center',
        'bottom-end' => 'indicator-bottom indicator-end',
    ];

    $classes .= ' ' . ($positions[$position] ?? 'indicator-top indicator-end');
@endphp

<div data-slot="indicator" {{ $attributes->merge(['class' => $classes]) }}>
    @if($item)
        <span class="indicator-item">{{ $item }}</span>
    @endif

    {{ $slot }}
</div>
