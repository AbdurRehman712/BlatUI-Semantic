@props([
    'vertical' => true,
])

<ul
    {{ $attributes->merge(['class' => 'timeline' . ($vertical ? '' : ' timeline-horizontal')]) }}
>
    {{ $slot }}
</ul>
