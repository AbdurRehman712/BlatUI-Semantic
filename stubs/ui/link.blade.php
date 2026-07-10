@props([
    'variant' => null,          // primary, secondary, accent, neutral, info, success, warning, error
    'hover' => false,
    'href' => null,
])

@php
    $classes = 'link';

    if ($variant) {
        $classes .= " link-{$variant}";
    }

    if ($hover) {
        $classes .= ' link-hover';
    }
@endphp

@if($href)
    <a
        data-slot="link"
        href="{{ $href }}"
        {{ $attributes->merge(['class' => $classes]) }}
    >
        {{ $slot }}
    </a>
@else
    <span data-slot="link" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </span>
@endif
