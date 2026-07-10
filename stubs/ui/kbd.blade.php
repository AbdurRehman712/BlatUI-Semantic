@props([
    'size' => 'md',              // xs, sm, md, lg
])

@php
    $classes = 'kbd';

    if ($size && $size !== 'md') {
        $classes .= " kbd-{$size}";
    }
@endphp

<kbd data-slot="kbd" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</kbd>
