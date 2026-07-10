@props(['key' => null, 'value' => null, 'depth' => 0])

<div data-slot="json-viewer-node" :style="'padding-left: ' + ({{ $depth }} * 16) + 'px'" {{ $attributes->merge(['class' => 'json-viewer-node text-sm']) }}>
    @if($key)<span class="text-primary">{{ $key }}</span>: @endif
    <span class="text-base-content/80">{{ json_encode($value) }}</span>
    {{ $slot }}
</div>
