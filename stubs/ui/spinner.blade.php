@props(['size' => 'md', 'color' => null])

@php
    $classes = 'loading';

    if ($size && $size !== 'md') {
        $classes .= " loading-{$size}";
    }

    if ($color) {
        $classes .= " text-{$color}";
    }
@endphp

<span data-slot="spinner" {{ $attributes->merge(['class' => $classes]) }} aria-label="Loading"></span>
