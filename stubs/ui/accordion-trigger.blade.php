@props(['as' => 'div'])

<{{ $as }} data-slot="accordion-trigger" {{ $attributes->merge(['class' => 'collapse-title']) }}>
    {{ $slot }}
</{{ $as }}>
