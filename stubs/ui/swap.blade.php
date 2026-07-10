@props([
    'effect' => 'rotate',         // rotate, flip
    'active' => false,
])

@php
    $classes = 'swap';

    if ($effect === 'rotate') {
        $classes .= ' swap-rotate';
    } elseif ($effect === 'flip') {
        $classes .= ' swap-flip';
    }
@endphp

<label
    data-slot="swap"
    x-data="{ active: @js($active) }"
    {{ $attributes->merge(['class' => $classes]) }}
>
    <input
        type="checkbox"
        x-model="active"
        @if($active) checked @endif
    />

    @if(isset($on))
        <div class="swap-on">{{ $on }}</div>
    @endif

    @if(isset($off))
        <div class="swap-off">{{ $off }}</div>
    @endif

    @if(isset($indeterminate))
        <div class="swap-indeterminate">{{ $indeterminate }}</div>
    @endif

    {{ $slot }}
</label>
