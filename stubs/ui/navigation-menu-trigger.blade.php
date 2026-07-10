@props(['label' => null])

<li data-slot="navigation-menu-trigger" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
    <a @click="open = !open">{{ $label ?? $slot }}</a>
</li>
