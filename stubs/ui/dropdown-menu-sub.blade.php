@props([
    'open' => false,
])

<div
    data-slot="dropdown-menu-sub"
    x-data="{ subOpen: @js($open) }"
    {{ $attributes->merge(['class' => 'relative']) }}
>
    {{ $slot }}
</div>
