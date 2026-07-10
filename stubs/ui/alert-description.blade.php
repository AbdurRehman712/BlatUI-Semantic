@props(['as' => 'p'])

<{{ $as }} data-slot="alert-description" {{ $attributes->merge(['class' => 'alert-description']) }}>
    {{ $slot }}
</{{ $as }}>
