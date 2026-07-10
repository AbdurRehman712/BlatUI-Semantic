@props([
    'center' => false,
    'end' => false,
    'vertical' => false,
    'autoPlay' => false,
    'interval' => 4000,
    'navigation' => true,
])

@php
    $classes = 'carousel';

    if ($center) {
        $classes .= ' carousel-center';
    }

    if ($end) {
        $classes .= ' carousel-end';
    }

    if ($vertical) {
        $classes .= ' carousel-vertical';
    }
@endphp

@if($autoPlay)
    <div
        x-data="{ active: 0, total: $refs.container.children.length }"
        x-init="setInterval(() => { active = (active + 1) % total; $refs.container.scrollTo({ left: active * $refs.container.children[0].offsetWidth, behavior: 'smooth' }); }, @js($interval))"
    >
@endif

<div
    data-slot="carousel"
    {{ $attributes->merge(['class' => $classes]) }}
    @if($autoPlay) x-ref="container" @endif
    role="region"
    aria-label="Carousel"
>
    {{ $slot }}
</div>

@if($navigation && !$vertical)
    <div class="flex justify-center gap-2 mt-4">
        {{ $navigation }}
    </div>
@endif

@if($autoPlay)
    </div>
@endif
