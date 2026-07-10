@props(['color' => 'primary', 'size' => 'md'])

<div data-slot="aurora" {{ $attributes->merge(['class' => 'aurora aurora-' . $color]) }}>
    {{ $slot }}
</div>
