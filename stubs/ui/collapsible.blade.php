@props(['open' => false])

<div data-slot="collapsible" x-data="{ open: {{ $open ? 'true' : 'false' }} }" {{ $attributes }}>
    {{ $slot }}
</div>
