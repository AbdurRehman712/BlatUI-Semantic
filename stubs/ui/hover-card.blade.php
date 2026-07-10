@props(['open' => false])

<div
    data-slot="hover-card"
    x-data="{ open: {{ $open ? 'true' : 'false' }} }"
    @mouseenter="open = true"
    @mouseleave="open = false"
    {{ $attributes->merge(['class' => 'hover-card relative inline-block']) }}
>
    {{ $slot }}
</div>
