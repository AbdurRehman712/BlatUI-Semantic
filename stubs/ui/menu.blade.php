@props([
    'size' => 'md',            // xs, sm, md, lg
    'horizontal' => false,
])

@php
    $classes = 'menu';

    if ($horizontal) {
        $classes .= ' menu-horizontal';
    }

    if ($size && $size !== 'md') {
        $classes .= " menu-{$size}";
    }
@endphp

<ul
    data-slot="menu"
    {{ $attributes->merge(['class' => $classes]) }}
    role="menubar"
>
    {{ $slot }}
</ul>
