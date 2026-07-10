@props([
    'title' => null,
    'href' => null,
    'active' => false,
    'disabled' => false,
    'icon' => null,
    'badge' => null,
    'badgeVariant' => 'primary',
    'collapsible' => false,
])

@php
    $classes = '';
    if ($active) {
        $classes .= ' menu-active';
    }
    if ($disabled) {
        $classes .= ' menu-disabled';
    }
@endphp

@if($collapsible)
    <li x-data="{ open: @js($active) }" class="space-y-1">
        <a
            @if($href) href="{{ $href }}" @else role="button" @endif
            x-on:click="open = !open"
            class="{{ $classes }}"
            tabindex="0"
        >
            @if($icon){{ $icon }}@endif
            <span>{{ $title ?? $slot }}</span>
            @if($badge)
                <span class="badge badge-{{ $badgeVariant }} badge-sm ml-auto">{{ $badge }}</span>
            @endif
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                class="size-4 transition-transform"
                :class="{ 'rotate-180': open }"
            >
                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </a>
        <ul x-show="open" x-collapse class="menu ml-3">
            {{ $slot }}
        </ul>
    </li>
@else
    <li>
        @if($href)
            <a
                href="{{ $href }}"
                @if($active) aria-current="page" @endif
                @if($disabled) aria-disabled="true" tabindex="-1" @endif
                class="{{ $classes }}"
            >
                @if($icon){{ $icon }}@endif
                <span>{{ $title ?? $slot }}</span>
                @if($badge)
                    <span class="badge badge-{{ $badgeVariant }} badge-sm ml-auto">{{ $badge }}</span>
                @endif
            </a>
        @else
            <button
                @if($disabled) disabled @endif
                class="{{ $classes }}"
            >
                @if($icon){{ $icon }}@endif
                <span>{{ $title ?? $slot }}</span>
                @if($badge)
                    <span class="badge badge-{{ $badgeVariant }} badge-sm ml-auto">{{ $badge }}</span>
                @endif
            </button>
        @endif
    </li>
@endif
