@props(['src' => null, 'alt' => '', 'lazy' => false])

<img data-slot="image" src="{{ $src }}" alt="{{ $alt }}" loading="{{ $lazy ? 'lazy' : 'eager' }}" {{ $attributes->merge(['class' => 'image']) }} />
