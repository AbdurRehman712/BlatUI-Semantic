@props(['as' => 'nav'])

<{{ $as }} data-slot="stepper-nav" {{ $attributes->merge(['class' => 'stepper-nav flex items-center gap-2']) }}>
    {{ $slot }}
</{{ $as }}>
