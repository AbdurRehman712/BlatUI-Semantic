@props([
    'variant' => 'bordered',
    'size' => 'md',
    'default' => null,
])

@php
    $classes = 'tabs';

    if ($variant === 'boxed') {
        $classes .= ' tabs-boxed';
    } elseif ($variant === 'lifted') {
        $classes .= ' tabs-lifted';
    } else {
        $classes .= ' tabs-bordered';
    }

    if ($size && $size !== 'md') {
        $classes .= " tabs-{$size}";
    }
@endphp

<div
    data-slot="tabs"
    x-data="{ activeTab: '{{ $default }}' }"
    {{ $attributes->merge(['class' => $classes]) }}
    role="tablist"
>
    {{ $slot }}
</div>
