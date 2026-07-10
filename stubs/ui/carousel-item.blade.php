@props([
    'src' => null,
    'alt' => null,
])

<div data-slot="carousel-item" {{ $attributes->merge(['class' => 'carousel-item']) }}>
    @if($src)
        <img src="{{ $src }}" alt="{{ $alt ?? '' }}" class="w-full object-cover" />
    @else
        {{ $slot }}
    @endif
</div>
