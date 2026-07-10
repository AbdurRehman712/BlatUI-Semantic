@props(['as' => 'div'])

<{{ $as }} data-slot="card-action" {{ $attributes->merge(['class' => 'card-action']) }}>
    {{ $slot }}
</{{ $as }}>
