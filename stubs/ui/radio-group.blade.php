@props(['name' => null, 'value' => null, 'orientation' => 'vertical'])

<div
    data-slot="radio-group"
    x-data="{ selected: '{{ $value }}' }"
    {{ $attributes->merge(['class' => 'radio-group flex' . ($orientation === 'vertical' ? ' flex-col gap-2' : ' flex-wrap gap-4')]) }}
>
    {{ $slot }}
</div>
