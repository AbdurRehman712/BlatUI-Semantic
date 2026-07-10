@props([
    'align' => 'start',
    'position' => 'bottom',
    'hover' => false,
    'open' => false,
    'label' => null,
    'icon' => null,
])

@php
    $classes = 'dropdown';

    if ($align === 'end') {
        $classes .= ' dropdown-end';
    }

    if ($position === 'top') {
        $classes .= ' dropdown-top';
    } elseif ($position === 'left') {
        $classes .= ' dropdown-left';
    } elseif ($position === 'right') {
        $classes .= ' dropdown-right';
    }

    if ($hover) {
        $classes .= ' dropdown-hover';
    }
@endphp

<div
    data-slot="dropdown"
    x-data="{ open: @js($open) }"
    {{ $attributes->merge(['class' => $classes]) }}
>
    @if(isset($trigger))
        <div
            x-on:click="open = !open"
            x-on:click.outside="open = false"
            x-on:keydown.escape="open = false"
            role="button"
            tabindex="0"
            aria-haspopup="true"
            :aria-expanded="open"
        >
            {{ $trigger }}
        </div>
    @else
        <button
            x-on:click="open = !open"
            x-on:click.outside="open = false"
            x-on:keydown.escape="open = false"
            aria-haspopup="true"
            :aria-expanded="open"
            class="btn btn-outline btn-sm"
        >
            @if($icon)
                {{ $icon }}
            @endif
            {{ $label ?? 'Menu' }}
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4" :class="{ 'rotate-180': open }">
                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </button>
    @endif

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        x-on:click.outside="open = false"
        x-on:keydown.escape="open = false"
        class="dropdown-content"
        role="menu"
    >
        {{ $slot }}
    </div>
</div>
