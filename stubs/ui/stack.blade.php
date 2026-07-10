@props([
    'items' => 3,
])

<div data-slot="stack" {{ $attributes->merge(['class' => 'stack']) }}>
    {{ $slot }}
</div>
