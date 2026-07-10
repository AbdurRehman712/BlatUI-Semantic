@props(['size' => 'md', 'thick' => false])

@php
    $classes = 'divider';

    if ($size && $size !== 'md') {
        $classes .= " divider-{$size}";
    }

    if ($thick) {
        $classes .= ' divider-thick';
    }
@endphp

<div data-slot="divider" role="separator" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
