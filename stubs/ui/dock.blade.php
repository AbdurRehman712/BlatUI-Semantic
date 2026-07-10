@props(['position' => 'bottom'])

<div data-slot="dock" {{ $attributes->merge(['class' => 'dock' . ($position !== 'bottom' ? ' dock-' . $position : '')]) }}>
    {{ $slot }}
</div>
