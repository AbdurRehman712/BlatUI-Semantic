@props(['as' => 'p'])

<{{ $as }} data-slot="card-description" {{ $attributes->merge(['class' => 'card-description']) }}>
    {{ $slot }}
</{{ $as }}>
