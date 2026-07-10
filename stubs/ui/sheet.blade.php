@props([
    'title' => null,
    'open' => false,
    'position' => 'right',
    'size' => 'md',
    'closeOnOutside' => true,
    'closeOnEscape' => true,
])

@php
    $classes = 'drawer';

    if ($open) {
        $classes .= ' drawer-open';
    }

    if ($position === 'right') {
        $classes .= ' drawer-end';
    }

    $widths = [
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        '2xl' => 'max-w-2xl',
        '3xl' => 'max-w-3xl',
    ];
    $widthClass = $widths[$size] ?? 'max-w-md';
@endphp

<div
    data-slot="sheet"
    x-data="{ open: @js($open) }"
    x-on:keydown.escape="if (@js($closeOnEscape)) open = false"
    {{ $attributes->merge(['class' => $classes]) }}
    x-cloak
>
    {{ $trigger ?? '' }}

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="drawer-overlay"
        @if($closeOnOutside) x-on:click="open = false" @endif
    ></div>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-x-full"
        x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-0 translate-x-full"
        class="drawer-side {{ $widthClass }}"
        role="dialog"
        aria-modal="true"
        @if($title) aria-label="{{ $title }}" @endif
    >
        @if($title)
            <div class="flex items-center justify-between p-4 border-b border-border">
                <h2 class="text-lg font-semibold">{{ $title }}</h2>
                <button
                    x-on:click="open = false"
                    class="btn btn-ghost btn-sm btn-square"
                    aria-label="Close sheet"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                    </svg>
                </button>
            </div>
        @endif

        <div class="p-4 overflow-y-auto flex-1">
            {{ $slot }}
        </div>

        @if(isset($footer))
            <div class="p-4 border-t border-border">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
