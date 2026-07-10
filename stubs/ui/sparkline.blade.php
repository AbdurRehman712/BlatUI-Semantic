@props(['value' => null, 'max' => 100, 'variant' => null, 'size' => 'md'])

@php
    $classes = 'progress';

    if ($variant) {
        $classes .= " progress-{$variant}";
    }

    if ($size && $size !== 'md') {
        $classes .= " progress-{$size}";
    }
@endphp

<progress
    data-slot="progress"
    value="{{ $value }}"
    max="{{ $max }}"
    {{ $attributes->merge(['class' => $classes]) }}
>{{ $slot }}</progress>
