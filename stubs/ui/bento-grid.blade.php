@props(['cols' => 3])

<div data-slot="bento-grid" {{ $attributes->merge(['class' => 'bento-grid grid grid-cols-1 md:grid-cols-' . $cols . ' gap-4']) }}>
    {{ $slot }}
</div>
