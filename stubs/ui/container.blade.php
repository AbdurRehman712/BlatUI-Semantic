@props(['fluid' => false])

<div data-slot="container" {{ $attributes->merge(['class' => $fluid ? 'w-full' : 'container mx-auto px-4']) }}>
    {{ $slot }}
</div>
