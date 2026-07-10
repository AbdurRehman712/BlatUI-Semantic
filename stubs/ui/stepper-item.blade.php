@props(['index' => 1, 'title' => null, 'active' => false, 'completed' => false])

<div
    data-slot="stepper-item"
    {{ $attributes->merge(['class' => 'step' . ($completed ? ' step-primary' : '') . ($active ? ' step-primary' : '')]) }}
>
    @if($title){{ $title }}@else{{ $slot }}@endif
</div>
