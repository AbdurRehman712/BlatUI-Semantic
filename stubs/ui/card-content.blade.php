@props(['as' => 'div'])

<{{ $as }} data-slot="card-content" {{ $attributes->merge(['class' => 'card-content']) }}>
    {{ $slot }}
</{{ $as }}>
