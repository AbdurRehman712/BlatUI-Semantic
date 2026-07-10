@props(['front' => null, 'back' => null, 'perspective' => '3d'])

<div data-slot="flip-card" x-data="{ flipped: false }" {{ $attributes->merge(['class' => 'flip-card group perspective-[1000px] cursor-pointer']) }}>
    <div :class="flipped ? '[transform:rotateY(180deg)]' : ''" class="relative transition-transform duration-700 [transform-style:preserve-3d]">
        <div class="[backface-visibility:hidden]">
            @if($front){{ $front }}@else{{ $slot }}@endif
        </div>
        <div class="absolute inset-0 [backface-visibility:hidden] [transform:rotateY(180deg)]">
            @if($back){{ $back }}@endif
        </div>
    </div>
</div>
