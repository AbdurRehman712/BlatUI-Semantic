<div
    data-slot="dropdown-menu-content"
    x-show="open"
    @click.outside="open = false"
    x-transition
    {{ $attributes->merge(['class' => 'dropdown-content menu p-2 shadow bg-base-100 rounded-box w-56 z-[999]']) }}
>
    {{ $slot }}
</div>
