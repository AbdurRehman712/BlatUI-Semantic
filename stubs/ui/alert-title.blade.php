@props(['as' => 'h5'])

<{{ $as }} data-slot="alert-title" {{ $attributes->merge(['class' => 'alert-title']) }}>
    {{ $slot }}
</{{ $as }}>
