@props(['beforeSrc' => null, 'afterSrc' => null])

<div
    data-slot="comparison-slider"
    x-data="{ pos: 50 }"
    {{ $attributes->merge(['class' => 'comparison-slider relative overflow-hidden rounded-xl select-none']) }}
>
    @if($afterSrc)<img src="{{ $afterSrc }}" class="w-full" />@endif
    <div class="absolute inset-0 overflow-hidden" :style="'clip-path: inset(0 ' + (100 - pos) + '% 0 0)'">
        @if($beforeSrc)<img src="{{ $beforeSrc }}" class="w-full max-w-none" :style="'width: ' + $el.parentElement.offsetWidth + 'px'" />@endif
    </div>
    <div class="absolute inset-y-0" :style="'left: ' + pos + '%'" style="width:2px;background:#fff;transform:translateX(-50%)"></div>
    {{ $slot }}
</div>
