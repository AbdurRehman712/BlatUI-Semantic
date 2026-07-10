@props(['src' => null, 'alt' => ''])

<img data-slot="avatar-image" src="{{ $src }}" alt="{{ $alt }}" {{ $attributes->merge(['class' => 'avatar-image']) }} />
