@props(['align' => 'start'])

<div
    data-slot="context-menu"
    x-data="{ open: false, x: 0, y: 0 }"
    @contextmenu.prevent="open = true; x = $event.clientX; y = $event.clientY"
    @click.outside="open = false"
    @keydown.escape.window="open = false"
    {{ $attributes }}
>
    {{ $slot }}
</div>
