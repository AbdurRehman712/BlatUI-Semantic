@props([
    'variant' => 'info',
    'outline' => false,
    'soft' => false,
    'dash' => false,
    'title' => null,
    'description' => null,
    'icon' => true,
    'dismissible' => false,
])

@php
    $classes = 'alert';

    if ($variant) {
        $classes .= " alert-{$variant}";
    }

    if ($outline) {
        $classes .= ' alert-outline';
    }

    if ($soft) {
        $classes .= ' alert-soft';
    }

    if ($dash) {
        $classes .= ' alert-dash';
    }

    $xData = $dismissible ? "x-data=\"{ show: true }\" x-show=\"show\" x-transition:leave=\"transition ease-in duration-300\" x-transition:leave-start=\"opacity-100\" x-transition:leave-end=\"opacity-0\"" : '';
@endphp

<div
    data-slot="alert"
    role="alert"
    {!! $xData !!}
    {{ $attributes->merge(['class' => $classes]) }}
>
    @if($icon)
        @switch($variant)
            @case('info')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                </svg>
                @break
            @case('success')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                @break
            @case('warning')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                </svg>
                @break
            @case('error')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                @break
            @default
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                </svg>
        @endswitch
    @endif

    <div class="flex flex-col gap-1">
        @if($title)
            <div class="alert-title">{{ $title }}</div>
        @endif
        @if($description)
            <div class="alert-description">{{ $description }}</div>
        @endif
        {{ $slot }}
    </div>

    @if(isset($actions))
        <div class="alert-actions">
            {{ $actions }}
        </div>
    @endif

    @if($dismissible)
        <button type="button" class="alert-close" @click="show = false" aria-label="Close alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
    @endif
</div>
