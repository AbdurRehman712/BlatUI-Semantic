@props(['as' => 'div'])

<{{ $as }} data-slot="alert-action" {{ $attributes->merge(['class' => 'alert-action']) }}>
    {{ $slot }}
</{{ $as }}>
