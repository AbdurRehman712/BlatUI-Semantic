@props(['label' => 'Add to Cart'])

<button data-slot="btn" {{ $attributes->merge(['class' => 'btn btn-primary']) }}>
    {{ $slot }}
</button>
