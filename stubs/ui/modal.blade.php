@props([
    'title' => null,
    'open' => false,
    'size' => 'md',
    'closeOnOutside' => true,
    'closeOnEscape' => true,
])

@php
    $classes = 'modal';

    $boxClasses = 'modal-box';

    if ($size === 'lg') {
        $boxClasses .= ' max-w-3xl';
    } elseif ($size === 'xl') {
        $boxClasses .= ' max-w-5xl';
    } elseif ($size === 'sm') {
        $boxClasses .= ' max-w-sm';
    }
@endphp

<div
    data-slot="modal"
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
        class="modal-backdrop"
        @if($closeOnOutside) x-on:click="open = false" @endif
        aria-hidden="true"
    ></div>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95 translate-y-4"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 translate-y-4"
        class="{{ $boxClasses }}"
        role="dialog"
        aria-modal="true"
        @if($title) aria-label="{{ $title }}" @endif
    >
        @if($title)
            <div class="flex items-center justify-between mb-4">
                <h3 class="card-title text-lg font-semibold">{{ $title }}</h3>
                <button
                    x-on:click="open = false"
                    class="btn btn-ghost btn-sm btn-square"
                    aria-label="Close modal"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                    </svg>
                </button>
            </div>
        @endif

        {{ $slot }}

        @if(isset($actions))
            <div class="modal-action mt-6 flex justify-end gap-2">
                {{ $actions }}
            </div>
        @endif
    </div>
</div>
