@props(['side' => 'left', 'width' => 'w-72', 'collapsible' => true])

@php
    $sideClass = $side === 'right' ? 'drawer-end' : '';
@endphp

<div
    data-slot="sidebar"
    x-data="{ open: false }"
    {{ $attributes->merge(['class' => 'drawer ' . $sideClass]) }}
>
    <input id="sidebar-drawer" type="checkbox" x-model="open" class="drawer-toggle" />
    {{ $slot }}
</div>
