@props([
    'position' => 'bottom-end',     // top-start, top-center, top-end, middle-start, middle-center, middle-end, bottom-start, bottom-center, bottom-end
    'open' => false,
    'duration' => 5000,
    'variant' => null,              // primary, secondary, info, success, warning, error
])

@php
    $classes = 'toast';

    $positions = [
        'top-start' => 'toast-top toast-start',
        'top-center' => 'toast-top toast-center',
        'top-end' => 'toast-top toast-end',
        'middle-start' => 'toast-middle toast-start',
        'middle-center' => 'toast-middle toast-center',
        'middle-end' => 'toast-middle toast-end',
        'bottom-start' => 'toast-bottom toast-start',
        'bottom-center' => 'toast-bottom toast-center',
        'bottom-end' => 'toast-bottom toast-end',
    ];

    $classes .= ' ' . ($positions[$position] ?? 'toast-bottom toast-end');
@endphp

<div
    data-slot="toast"
    x-data="{ open: @js($open) }"
    {{ $attributes->merge(['class' => $classes]) }}
>
    {{ $slot }}
</div>
