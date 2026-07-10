@props([
    'open' => false,
    'position' => 'left',
    'noOverlay' => false,
    'title' => null,
])

@php
    $classes = 'drawer';

    if ($open) {
        $classes .= ' drawer-open';
    }

    if ($position === 'right') {
        $classes .= ' drawer-end';
    }
@endphp

<div
    data-slot="drawer"
    x-data="{ open: @js($open) }"
    x-on:keydown.escape="open = false"
    {{ $attributes->merge(['class' => $classes]) }}
    x-cloak
>
    {{ $trigger ?? '' }}

    @if(!$noOverlay)
        <div
            x-show="open"
            x-transition:enter="transition-opacity duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="drawer-overlay"
            x-on:click="open = false"
        ></div>
    @endif

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-x-full"
        x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-0 -translate-x-full"
        class="drawer-side"
        role="dialog"
        aria-modal="true"
    >
        @if($title)
            <div class="px-4 py-3 border-b border-border font-semibold text-lg">
                {{ $title }}
            </div>
        @endif

        {{ $slot }}
    </div>

    @if(isset($content))
        <div class="drawer-content">
            {{ $content }}
        </div>
    @endif
</div>
