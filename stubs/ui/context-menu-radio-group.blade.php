@props(['name' => null])

<div data-slot="context-menu-radio-group" {{ $attributes->merge(['class' => 'context-menu-radio-group']) }}>
    {{ $slot }}
</div>
