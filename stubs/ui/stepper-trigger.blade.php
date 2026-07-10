@props(['as' => 'button'])

<{{ $as }} data-slot="stepper-trigger" {{ $attributes->merge(['class' => 'stepper-trigger']) }}>
    {{ $slot }}
</{{ $as }}>
