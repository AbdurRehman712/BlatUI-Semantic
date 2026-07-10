<div
    data-slot="sheet-content"
    x-show="open"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-x-full"
    x-transition:enter-end="opacity-100 translate-x-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-x-0"
    x-transition:leave-end="opacity-0 translate-x-full"
    @click.outside="open = false"
    {{ $attributes->merge(['class' => 'fixed right-0 top-0 h-full w-80 max-w-full bg-base-100 shadow-2xl z-50 overflow-y-auto']) }}
>
    {{ $slot }}
</div>
