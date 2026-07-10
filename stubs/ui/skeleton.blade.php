@props([
    'circle' => false,
    'width' => null,
    'height' => null,
    'class' => '',
])

@php
    $classes = 'skeleton';

    if ($circle) {
        $classes .= ' skeleton-circle';
    }

    $style = '';
    if ($width) {
        $style .= " width: {$width};";
    }
    if ($height) {
        $style .= " height: {$height};";
    }
@endphp

<div
    data-slot="skeleton"
    {{ $attributes->merge(['class' => $classes]) }}
    @if($style) style="{{ $style }}" @endif
    aria-hidden="true"
></div>
