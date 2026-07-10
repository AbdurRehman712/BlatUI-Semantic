@props([
    'variant' => null,
    'size' => 'md',
    'ghost' => false,
    'name' => null,
    'id' => null,
    'placeholder' => null,
    'rows' => 4,
])

@php
    $classes = 'textarea';

    if ($variant) {
        $classes .= " textarea-{$variant}";
    }

    if ($size && $size !== 'md') {
        $classes .= " textarea-{$size}";
    }

    if ($ghost) {
        $classes .= ' textarea-ghost';
    }
@endphp

<textarea
    data-slot="textarea"
    @if($name) name="{{ $name }}" @endif
    @if($id) id="{{ $id }}" @endif
    @if($placeholder) placeholder="{{ $placeholder }}" @endif
    rows="{{ $rows }}"
    {{ $attributes->merge(['class' => $classes]) }}
>{{ $slot }}</textarea>
