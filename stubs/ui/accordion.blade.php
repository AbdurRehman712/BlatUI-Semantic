@props([
    'multiple' => false,
    'keepOpen' => false,
])

<div
    data-slot="accordion"
    x-data="{ openItems: @js($multiple ? [] : null) }"
    {{ $attributes->merge(['class' => 'space-y-2']) }}
>
    {{ $slot }}
</div>
