@props(['speed' => 30, 'pauseOnHover' => true])

<div
    data-slot="marquee"
    class="marquee overflow-hidden whitespace-nowrap"
    {{ $attributes->merge(['class' => 'marquee overflow-hidden']) }}
    @if($pauseOnHover) @mouseenter="speed = 0" @mouseleave="speed = {{ $speed }}" @endif
>
    <div class="inline-block animate-marquee" :style="'animation-duration: ' + (100 / {{ $speed }}) + 's'">
        {{ $slot }}
    </div>
</div>
