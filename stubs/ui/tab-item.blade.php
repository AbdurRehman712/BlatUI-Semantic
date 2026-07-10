@props([
    'label' => null,
    'value' => null,
    'active' => false,
    'disabled' => false,
    'icon' => null,
])

@php
    $classes = 'tab';

    if ($active) {
        $classes .= ' tab-active';
    }

    if ($disabled) {
        $classes .= ' tab-disabled';
    }
@endphp

<button
    {{ $attributes->merge(['class' => $classes]) }}
    role="tab"
    @if($disabled) disabled aria-disabled="true" @endif
    @if($active) aria-selected="true" @endif
>
    @if($icon){{ $icon }}@endif
    {{ $label ?? $slot }}
</button>
