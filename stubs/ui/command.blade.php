@props(['open' => false, 'value' => ''])

<div
    data-slot="command"
    x-data="{ query: '{{ $value }}', open: {{ $open ? 'true' : 'false' }} }"
    {{ $attributes->merge(['class' => 'command dropdown dropdown-end w-full']) }}
>
    {{ $slot }}
</div>
