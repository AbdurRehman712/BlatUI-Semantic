@props(['speed' => 0.5])

<div
    data-slot="parallax"
    x-data="{ offset: 0 }"
    x-init="window.addEventListener('scroll', () => { offset = window.scrollY * {{ $speed }}; })"
    :style="'transform: translateY(' + offset + 'px)'"
    {{ $attributes->merge(['class' => 'parallax will-change-transform']) }}
>
    {{ $slot }}
</div>
