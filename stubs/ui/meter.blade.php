@props(['variant' => null, 'size' => 'md'])

@php
    $classes = 'meter';

    if ($variant) {
        $classes .= " meter-{$variant}";
    }

    if ($size && $size !== 'md') {
        $classes .= " meter-{$size}";
    }
@endphp

<meter data-slot="meter" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</meter>
