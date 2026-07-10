@props([
    'variant' => null,
    'size' => 'md',
    'ghost' => false,
    'name' => null,
    'id' => null,
    'placeholder' => null,
    'options' => [],
    'selected' => null,
    'includeEmpty' => false,
    'emptyLabel' => 'Select an option...',
])

@php
    $classes = 'select';

    if ($variant) {
        $classes .= " select-{$variant}";
    }

    if ($size && $size !== 'md') {
        $classes .= " select-{$size}";
    }

    if ($ghost) {
        $classes .= ' select-ghost';
    }
@endphp

<select
    data-slot="select"
    @if($name) name="{{ $name }}" @endif
    @if($id) id="{{ $id }}" @endif
    {{ $attributes->merge(['class' => $classes]) }}
>
    @if($includeEmpty)
        <option value="">{{ $emptyLabel }}</option>
    @endif

    @forelse ($options as $key => $label)
        <option
            value="{{ is_string($key) ? $key : $label }}"
            @if((is_string($key) ? $key : $label) == (old($name) ?? $selected)) selected @endif
        >
            {{ $label }}
        </option>
    @empty
        {{ $slot }}
    @endforelse
</select>
