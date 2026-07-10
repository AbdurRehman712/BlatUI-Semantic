@props([
    'title' => null,
    'icon' => true,
    'open' => false,
    'id' => null,
])

@php
    $collapsedId = $id ?? 'collapse-' . \Illuminate\Support\Str::random(8);
@endphp

<div
    data-slot="accordion-item"
    x-data="{ open: @js($open) }"
    {{ $attributes->merge(['class' => 'collapse']) }}
>
    <div
        x-on:click="open = !open"
        class="collapse-title"
        role="button"
        tabindex="0"
        :aria-expanded="open"
    >
        @if($icon)
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                class="size-4 transition-transform duration-200"
                :class="{ 'rotate-180': open }"
            >
                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        @endif
        {{ $title ?? $slot }}
    </div>

    <div
        x-show="open"
        x-collapse
        class="collapse-content"
    >
        {{ $slot }}
    </div>
</div>
