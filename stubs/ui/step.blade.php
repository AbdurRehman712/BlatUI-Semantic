@props([
    'variant' => null,        // primary, secondary, info, success, warning, error, neutral
    'active' => false,
    'completed' => false,
    'label' => null,
])

@php
    $classes = 'step';

    if ($variant) {
        $classes .= " step-{$variant}";
    }

    if ($completed) {
        $classes .= ' step-completed';
    }
@endphp

<li
    {{ $attributes->merge(['class' => $classes]) }}
    @if($active) aria-current="step" @endif
>
    {{ $label ?? $slot }}
</li>
