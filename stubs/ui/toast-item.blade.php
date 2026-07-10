@props([
    'variant' => null,         // primary, secondary, info, success, warning, error
    'dismissible' => true,
    'duration' => 5000,
])

@php
    $classes = 'alert';

    if ($variant) {
        $classes .= " alert-{$variant}";
    }
@endphp

<div
    x-data="{ show: true }"
    x-init="if (@js($duration) > 0) { setTimeout(() => show = false, @js($duration)); }"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-2"
    {{ $attributes->merge(['class' => $classes]) }}
    role="alert"
>
    {{ $slot }}

    @if($dismissible)
        <button
            x-on:click="show = false"
            class="btn btn-ghost btn-xs btn-square shrink-0"
            aria-label="Dismiss"
        >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
            </svg>
        </button>
    @endif
</div>
