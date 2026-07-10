@props(['orientation' => 'horizontal'])

<nav data-slot="navigation-menu" {{ $attributes->merge(['class' => 'navigation-menu navbar']) }}>
    {{ $slot }}
</nav>
