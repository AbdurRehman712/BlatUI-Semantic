@props([
    'variant' => null,
    'size' => 'md',
    'ghost' => false,
    'type' => 'text',
    'name' => null,
    'id' => null,
    'placeholder' => null,
    'value' => null,
    'leading' => null,
    'trailing' => null,
])

@php
    $classes = 'input';

    if ($variant) {
        $classes .= " input-{$variant}";
    }

    if ($size && $size !== 'md') {
        $classes .= " input-{$size}";
    }

    if ($ghost) {
        $classes .= ' input-ghost';
    }

    $hasLeading = $leading || isset($$leading);
    $hasTrailing = $trailing || isset($$trailing);
    $isPassword = $type === 'password';
    $wrap = $hasLeading || $hasTrailing;
    $bindType = $isPassword ? "x-bind:type=\"show ? 'text' : 'password'\"" : '';
@endphp

@if($wrap || $isPassword)
    <div data-slot="input-wrapper" class="input-wrapper" x-data="{ show: false }">
        @if($hasLeading)
            <span class="input-leading" data-slot="input-leading">{{ $leading }}</span>
        @endif

        <input
            type="{{ $isPassword ? 'password' : $type }}"
            {!! $bindType !!}
            data-slot="input"
            @if($name) name="{{ $name }}" @endif
            @if($id) id="{{ $id }}" @endif
            @if($placeholder) placeholder="{{ $placeholder }}" @endif
            @if($value) value="{{ $value }}" @endif
            {{ $attributes->merge(['class' => $classes.($hasLeading ? ' input-leading' : '').($hasTrailing ? ' input-trailing' : '')]) }}
        />

        @if($isPassword)
            <button type="button" class="input-trailing-icon" @click="show = !show" aria-label="Toggle password visibility">
                <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg>
                <svg x-show="show" style="display: none;" xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.733 5.076a10.744 10.744 0 0 1 11.205 6.575 1 1 0 0 1 0 .696 10.747 10.747 0 0 1-1.444 2.49"/><path d="M14.084 14.158a3 3 0 0 1-4.242-4.242"/><path d="M17.479 17.499a10.75 10.75 0 0 1-15.417-5.151 1 1 0 0 1 0-.696 10.75 10.75 0 0 1 4.446-5.143"/><path d="m2 2 20 20"/></svg>
            </button>
        @elseif($hasTrailing)
            <span class="input-trailing-icon" data-slot="input-trailing">{{ $trailing }}</span>
        @endif
    </div>
@else
    <input
        type="{{ $type }}"
        data-slot="input"
        @if($name) name="{{ $name }}" @endif
        @if($id) id="{{ $id }}" @endif
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        @if($value) value="{{ $value }}" @endif
        {{ $attributes->merge(['class' => $classes]) }}
    />
@endif
