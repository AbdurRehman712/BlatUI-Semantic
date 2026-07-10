@props(['orientation' => 'horizontal', 'attached' => false])

<div data-slot="button-group" {{ $attributes->merge(['class' => 'join' . ($orientation === 'vertical' ? ' join-vertical' : '')]) }}>
    {{ $slot }}
</div>
