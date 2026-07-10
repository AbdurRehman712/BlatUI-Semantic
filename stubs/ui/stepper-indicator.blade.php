@props(['index' => 1, 'active' => false, 'completed' => false])

<span
    data-slot="stepper-indicator"
    {{ $attributes->merge(['class' => 'stepper-indicator step' . ($completed ? ' step-primary' : '') . ($active ? ' step-primary font-bold' : '')]) }}
>
    {{ $index }}
    {{ $slot }}
</span>
