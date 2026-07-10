@props(['as' => 'div'])

<{{ $as }} data-slot="card-header" {{ $attributes->merge(['class' => 'card-header']) }}>
    {{ $slot }}
</{{ $as }}>
