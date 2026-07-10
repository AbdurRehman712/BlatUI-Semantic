@props(['variant' => null, 'size' => 'md', 'ghost' => false, 'name' => null, 'id' => null, 'placeholder' => null, 'accept' => null])

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
    @if($placeholder) placeholder="{{ $placeholder }}" @endif
    @if($accept) accept="{{ $accept }}" @endif
    {{ $attributes->merge(['class' => $classes]) }}
/>
