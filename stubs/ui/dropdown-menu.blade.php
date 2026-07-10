@props(['align' => 'start', 'open' => false])

<div
    data-slot="dropdown-menu"
    x-data="{ open: {{ $open ? 'true' : 'false' }} }"
    {{ $attributes->merge(['class' => 'dropdown' . ($align === 'end' ? ' dropdown-end' : '')]) }}
>
    {{ $slot }}
</div>
