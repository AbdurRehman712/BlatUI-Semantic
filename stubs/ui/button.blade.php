@props([
    'variant' => 'primary',
    'size' => 'md',
    'shape' => null,
    'block' => false,
    'wide' => false,
    'active' => false,
    'type' => 'button',
    'href' => null,
    'as' => null,
    'disabled' => false,
    'loading' => false,
])

@php
    $classes = 'btn';

    if ($variant) {
        $classes .= " btn-{$variant}";
    }

    if ($size && $size !== 'md') {
        $classes .= " btn-{$size}";
    }

    if ($shape) {
        $classes .= " btn-{$shape}";
    }

    if ($block) {
        $classes .= ' btn-block';
    }

    if ($wide) {
        $classes .= ' btn-wide';
    }

    if ($active) {
        $classes .= ' btn-active';
    }

    $tag = $as ?: ($href ? 'a' : 'button');
@endphp

<{{ $tag }}
    data-slot="btn"
    @if ($tag === 'a' && $href) href="{{ $href }}" @endif
    @if ($tag === 'button') type="{{ $type }}" @endif
    @if($disabled && $tag === 'button') disabled @endif
    {{ $attributes->merge(['class' => $classes]) }}
>
    @if($loading)
        <span class="loading loading-spinner"></span>
    @endif
    {{ $slot }}
</{{ $tag }}>
