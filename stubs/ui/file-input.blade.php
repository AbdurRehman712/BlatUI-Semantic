@props([
    'variant' => null,        // primary, secondary, info, success, warning, error
    'size' => 'md',           // xs, sm, md, lg
    'ghost' => false,
    'name' => null,
    'id' => null,
    'accept' => null,
    'multiple' => false,
])

@php
    $classes = 'file-input';

    if ($variant) {
        $classes .= " file-input-{$variant}";
    }

    if ($size && $size !== 'md') {
        $classes .= " file-input-{$size}";
    }

    if ($ghost) {
        $classes .= ' file-input-ghost';
    }
@endphp

<input
    type="file"
    data-slot="file-input"
    @if($name) name="{{ $name }}" @endif
    @if($id) id="{{ $id }}" @endif
    @if($accept) accept="{{ $accept }}" @endif
    @if($multiple) multiple @endif
    {{ $attributes->merge(['class' => $classes]) }}
/>
