@props(['variant' => null, 'size' => 'md', 'name' => null, 'id' => null, 'value' => null, 'min' => null, 'max' => null, 'step' => null])

@php
    $classes = 'range';

    if ($variant) {
        $classes .= " range-{$variant}";
    }

    if ($size && $size !== 'md') {
        $classes .= " range-{$size}";
    }
@endphp

<input
    type="range"
    data-slot="knob"
    @if($name) name="{{ $name }}" @endif
    @if($id) id="{{ $id }}" @endif
    @if($value) value="{{ $value }}" @endif
    @if($min) min="{{ $min }}" @endif
    @if($max) max="{{ $max }}" @endif
    @if($step) step="{{ $step }}" @endif
    {{ $attributes->merge(['class' => $classes]) }}
/>
