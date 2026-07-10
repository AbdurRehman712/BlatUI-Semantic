@props([
    'vertical' => false,
])

<div
    data-slot="join"
    {{ $attributes->merge(['class' => 'join' . ($vertical ? ' join-vertical' : '')]) }}
    role="group"
>
    {{ $slot }}
</div>
