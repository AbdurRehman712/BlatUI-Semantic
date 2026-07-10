<div data-slot="meteors" {{ $attributes->merge(['class' => 'meteors absolute inset-0 overflow-hidden pointer-events-none']) }}>
    <div class="meteor" style="animation-delay: 0s; left: 10%; top: -10%"></div>
    <div class="meteor" style="animation-delay: 1.5s; left: 30%; top: -5%"></div>
    <div class="meteor" style="animation-delay: 3s; left: 55%; top: -15%"></div>
    <div class="meteor" style="animation-delay: 4.5s; left: 75%; top: -8%"></div>
    <div class="meteor" style="animation-delay: 6s; left: 90%; top: -12%"></div>
    {{ $slot }}
</div>
