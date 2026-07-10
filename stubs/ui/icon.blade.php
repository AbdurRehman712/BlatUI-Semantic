@props(['name' => null, 'size' => 5])

@php
    $iconClass = 'size-' . $size;
@endphp

@if($name)
    <svg data-slot="icon" {{ $attributes->merge(['class' => $iconClass]) }}>
        <use href="#icon-{{ $name }}" />
    </svg>
@else
    {{ $slot }}
@endif
