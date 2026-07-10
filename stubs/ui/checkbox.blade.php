@props([
    'variant' => null,
    'size' => 'md',
    'name' => null,
    'id' => null,
    'value' => '1',
    'checked' => false,
    'label' => null,
])

@php
    $classes = 'checkbox';

    if ($variant) {
        $classes .= " checkbox-{$variant}";
    }

    if ($size && $size !== 'md') {
        $classes .= " checkbox-{$size}";
    }
@endphp

<label class="label inline-flex cursor-pointer gap-2">
    <input
        type="checkbox"
        data-slot="checkbox"
        @if($name) name="{{ $name }}" @endif
        @if($id) id="{{ $id }}" @endif
        value="{{ $value }}"
        @if($checked || old($name)) checked @endif
        {{ $attributes->merge(['class' => $classes]) }}
    />
    @if($label)
        <span class="label-text">{{ $label }}</span>
    @endif
    {{ $slot }}
</label>
