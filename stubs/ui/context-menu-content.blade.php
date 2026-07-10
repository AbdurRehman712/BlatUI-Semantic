<div
    data-slot="context-menu-content"
    x-show="open"
    x-transition
    :style="'position: fixed; left: ' + x + 'px; top: ' + y + 'px; z-index: 9999'"
    @click.outside="open = false"
    {{ $attributes->merge(['class' => 'menu bg-base-100 shadow-xl rounded-box border border-base-200 p-2 w-56']) }}
>
    {{ $slot }}
</div>
