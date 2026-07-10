@props(['orientation' => 'horizontal'])

@php
    $menubarOrientationClass = $orientation === 'vertical' ? ' flex-col gap-1 bg-base-200 rounded-box p-1' : ' items-center gap-1 bg-base-200 rounded-box p-1';
@endphp

<div
    data-slot="menubar"
    x-data="{ openMenu: null }"
    x-on:keydown.escape.window="openMenu = null"
    {{ $attributes->merge(['class' => 'menubar flex' . $menubarOrientationClass]) }}
>
    {{ $slot }}
</div>
