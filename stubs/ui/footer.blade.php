@props([
    'center' => false,
])

<footer
    data-slot="footer"
    {{ $attributes->merge(['class' => 'footer' . ($center ? ' footer-center' : '')]) }}
>
    {{ $slot }}
</footer>
