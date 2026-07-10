@props(['as' => 'h3'])

<{{ $as }} data-slot="card-title" {{ $attributes->merge(['class' => 'card-title']) }}>
    {{ $slot }}
</{{ $as }}>
