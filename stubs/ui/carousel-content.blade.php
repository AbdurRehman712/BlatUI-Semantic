@props(['index' => 0])

<div data-slot="carousel-content" {{ $attributes->merge(['class' => 'carousel w-full']) }}>
    {{ $slot }}
</div>
