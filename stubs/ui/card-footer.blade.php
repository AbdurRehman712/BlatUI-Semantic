@props(['as' => 'div'])

<{{ $as }} data-slot="card-footer" {{ $attributes->merge(['class' => 'card-footer']) }}>
    {{ $slot }}
</{{ $as }}>
