@props(['name' => null, 'value' => null, 'multiple' => false])

<div
    data-slot="toggle-group"
    x-data="{ selected: @js($multiple ? [] : '{{ $value }}') }"
    {{ $attributes->merge(['class' => 'toggle-group join']) }}
>
    {{ $slot }}
</div>
