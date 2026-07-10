@props([
    'size' => 'md',
    'separator' => '/',
])

@php
    $classes = 'breadcrumbs';

    if ($size && $size !== 'md') {
        $classes .= " breadcrumbs-{$size}";
    }
@endphp

<nav data-slot="breadcrumb" {{ $attributes->merge(['class' => $classes]) }} aria-label="Breadcrumb">
    <ul>
        {{ $slot }}
    </ul>
</nav>
