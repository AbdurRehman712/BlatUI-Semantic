@props([
    'variant' => 'primary',
    'size' => 'md',
])

@php
    $classes = 'badge';

    if ($variant) {
        $classes .= " badge-{$variant}";
    }

    if ($size && $size !== 'md') {
        $classes .= " badge-{$size}";
    }
@endphp

<span data-slot="badge" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
