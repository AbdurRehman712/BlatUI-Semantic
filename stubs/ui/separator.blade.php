@props([
    'variant' => null,         // primary, info, success, warning, error
    'vertical' => false,
    'label' => null,
])

@php
    $classes = 'divider';

    if ($vertical) {
        $classes .= ' divider-vertical';
    }

    if ($variant) {
        $classes .= " divider-{$variant}";
    }
@endphp

<div data-slot="divider" role="separator" {{ $attributes->merge(['class' => $classes]) }}>
    @if($label)
        {{ $label }}
    @endif
    {{ $slot }}
</div>
