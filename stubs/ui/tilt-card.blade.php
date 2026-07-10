@props(['glare' => false])

<div
    data-slot="tilt-card"
    x-data="{ tiltX: 0, tiltY: 0 }"
    @mousemove="tiltX = ($event.offsetX / $el.offsetWidth - 0.5) * 20; tiltY = ($event.offsetY / $el.offsetHeight - 0.5) * -20"
    @mouseleave="tiltX = 0; tiltY = 0"
    :style="'transform: perspective(500px) rotateX(' + tiltY + 'deg) rotateY(' + tiltX + 'deg)'"
    {{ $attributes->merge(['class' => 'tilt-card card card-bordered bg-base-100 shadow-sm transition-transform duration-200 ease-out']) }}
>
    {{ $slot }}
</div>
