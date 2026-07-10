@props(['label' => null])

<div data-slot="menubar-menu" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" {{ $attributes->merge(['class' => 'menubar-menu relative']) }}>
    <button @click="open = !open" :class="open ? 'bg-base-300' : ''" class="btn btn-ghost btn-sm px-3">{{ $label ?? $slot }}</button>
    <div x-show="open" x-transition class="absolute top-full left-0 mt-1 menu bg-base-100 shadow-xl rounded-box border border-base-200 p-2 w-56 z-[999]">
        {{ $slot }}
    </div>
</div>
