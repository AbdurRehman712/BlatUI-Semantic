@props(['position' => 'bottom-right', 'icon' => null])

<div
    data-slot="speed-dial"
    x-data="{ open: false }"
    {{ $attributes->merge(['class' => 'speed-dial fixed z-50 flex flex-col items-center gap-2 bottom-6 right-6']) }}
>
    <div x-show="open" x-transition class="flex flex-col items-center gap-2 mb-2">
        {{ $slot }}
    </div>
    <button @click="open = !open" class="btn btn-primary btn-circle btn-lg shadow-xl">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" x-show="!open"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" x-show="open"><path d="M5 12h14"/></svg>
    </button>
</div>
