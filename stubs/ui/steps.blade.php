@props([
    'vertical' => false,
])

<ul
    {{ $attributes->merge(['class' => 'steps' . ($vertical ? ' steps-vertical' : '')]) }}
>
    {{ $slot }}
</ul>
