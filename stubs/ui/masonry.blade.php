@props(['columns' => 3])

<div data-slot="masonry" {{ $attributes->merge(['class' => 'masonry columns-1 sm:columns-2 md:columns-' . $columns . ' gap-4 space-y-4']) }}>
    {{ $slot }}
</div>
