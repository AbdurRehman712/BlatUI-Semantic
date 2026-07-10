@props(['maxHeight' => null])

<div
    data-slot="scroll-area"
    @if($maxHeight) style="max-height: {{ $maxHeight }}px;" @endif
    {{ $attributes->merge(['class' => 'scroll-area overflow-y-auto']) }}
>
    {{ $slot }}
</div>
