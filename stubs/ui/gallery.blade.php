@props(['columns' => 3])

<div data-slot="gallery" {{ $attributes->merge(['class' => 'gallery grid grid-cols-1 sm:grid-cols-2 md:grid-cols-' . $columns . ' gap-4']) }}>
    {{ $slot }}
</div>
