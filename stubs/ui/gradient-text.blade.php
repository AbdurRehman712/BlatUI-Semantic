@props(['from' => 'primary', 'to' => 'secondary'])

<span data-slot="gradient-text" {{ $attributes->merge(['class' => 'bg-gradient-to-r from-' . $from . ' to-' . $to . ' bg-clip-text text-transparent']) }}>
    {{ $slot }}
</span>
