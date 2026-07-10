@props([
    'variant' => null,   // primary, secondary, accent, info, success, warning, error
    'size' => 'md',      // xs, sm, md, lg
    'name' => null,
    'id' => null,
    'value' => '1',
    'checked' => false,
    'label' => null,
])

@php
    $classes = 'radio';

    if ($variant) {
        $classes .= " radio-{$variant}";
    }

    if ($size && $size !== 'md') {
        $classes .= " radio-{$size}";
    }
@endphp

<label class="label inline-flex cursor-pointer gap-2">
    <input
        type="radio"
        data-slot="radio"
        @if($name) name="{{ $name }}" @endif
        @if($id) id="{{ $id }}" @endif
        value="{{ $value }}"
        @if($checked || old($name)) checked @endif
        @if($disabled) disabled @endif
        {{ $attributes->merge(['class' => $classes]) }}
    />
    @if($label)
        <span class="label-text">{{ $label }}</span>
    @endif
    {{ $slot }}
</label>
