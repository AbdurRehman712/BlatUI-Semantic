@props([
    'position' => 'bottom',
    'align' => 'start',
    'open' => false,
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
@endphp

<div
    data-slot="popover"
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
        >
            {{ $trigger }}
        </div>
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
        class="dropdown-content p-4 min-w-60 bg-popover text-popover-foreground shadow-lg border rounded-xl"
    >
        {{ $slot }}
    </div>
</div>
