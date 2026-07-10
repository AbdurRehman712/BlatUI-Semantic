@props(['center' => '51.505,-0.09', 'zoom' => 13])

<div
    data-slot="map"
    x-data="{ map: null }"
    x-init="map = L.map($el).setView([{{ $center }}], {{ $zoom }}); L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; OpenStreetMap' }).addTo(map)"
    {{ $attributes->merge(['class' => 'map h-80 rounded-box']) }}
>
    {{ $slot }}
</div>
