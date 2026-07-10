@props(['name' => null, 'width' => 500, 'height' => 200])

<div
    data-slot="signature-pad"
    x-data="{ drawing: false, points: [], clear() { this.points = [] } }"
    {{ $attributes->merge(['class' => 'signature-pad border border-base-300 rounded-box']) }}
>
    <canvas
        width="{{ $width }}"
        height="{{ $height }}"
        @mousedown="drawing = true; points = [[$event.offsetX, $event.offsetY]]"
        @mousemove="if(!drawing) return; points.push([$event.offsetX, $event.offsetY]); const ctx = $el.getContext('2d'); ctx.strokeStyle = '#000'; ctx.lineWidth = 2; ctx.lineCap = 'round'; ctx.beginPath(); ctx.moveTo(points[points.length-2][0], points[points.length-2][1]); ctx.lineTo(points[points.length-1][0], points[points.length-1][1]); ctx.stroke()"
        @mouseup="drawing = false"
        @mouseleave="drawing = false"
        class="cursor-crosshair"
    ></canvas>
    @if($name)<input type="hidden" name="{{ $name }}" x-model="JSON.stringify(points)" />@endif
    {{ $slot }}
</div>
