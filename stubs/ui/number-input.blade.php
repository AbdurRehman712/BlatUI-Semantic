@props(['name' => null, 'value' => 0, 'min' => null, 'max' => null, 'step' => 1])

<div
    data-slot="number-input"
    x-data="{ val: {{ $value }} }"
    {{ $attributes->merge(['class' => 'number-input join']) }}
>
    <button type="button" @click="val = Math.max({{ $min ?? 'val' }}, val - {{ $step }}); $refs.input.value = val" class="join-item btn btn-outline btn-sm">−</button>
    <input
        type="number"
        @if($name) name="{{ $name }}" @endif
        x-ref="input"
        x-model="val"
        @if($min !== null) min="{{ $min }}" @endif
        @if($max !== null) max="{{ $max }}" @endif
        step="{{ $step }}"
        class="join-item input input-bordered input-sm w-16 text-center"
    />
    <button type="button" @click="val = Math.min({{ $max ?? '999999' }}, val + {{ $step }}); $refs.input.value = val" class="join-item btn btn-outline btn-sm">+</button>
    {{ $slot }}
</div>
