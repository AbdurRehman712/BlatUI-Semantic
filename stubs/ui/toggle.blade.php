@props([
    'variant' => null,
    'size' => 'md',
    'name' => null,
    'id' => null,
    'checked' => false,
    'label' => null,
    'onLabel' => null,
    'offLabel' => null,
])

@php
    $classes = 'toggle';

    if ($variant) {
        $classes .= " toggle-{$variant}";
    }

    if ($size && $size !== 'md') {
        $classes .= " toggle-{$size}";
    }
@endphp

<label class="label inline-flex cursor-pointer gap-2">
    @if($offLabel)
        <span class="label-text">{{ $offLabel }}</span>
    @endif

    <input
        type="checkbox"
        data-slot="toggle"
        @if($name) name="{{ $name }}" @endif
        @if($id) id="{{ $id }}" @endif
        @if($checked || old($name)) checked @endif
        {{ $attributes->merge(['class' => $classes]) }}
    />

    @if($onLabel)
        <span class="label-text">{{ $onLabel }}</span>
    @endif

    {{ $slot }}
</label>
