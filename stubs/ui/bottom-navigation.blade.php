@props(['items' => []])

<nav data-slot="bottom-navigation" {{ $attributes->merge(['class' => 'btm-nav']) }}>
    {{ $slot }}
</nav>
