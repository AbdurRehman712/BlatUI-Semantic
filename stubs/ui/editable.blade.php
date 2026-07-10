@props(['name' => null, 'value' => null, 'placeholder' => 'Click to edit'])

<div
    data-slot="editable"
    x-data="{ editing: false, val: '{{ $value }}' }"
    {{ $attributes->merge(['class' => 'editable']) }}
>
    <div x-show="!editing" @dblclick="editing = true" class="cursor-pointer px-2 py-1 rounded hover:bg-base-200" x-text="val || '{{ $placeholder }}'"></div>
    <input x-show="editing" x-model="val" @blur="editing = false" @keydown.enter="editing = false" @keydown.escape="editing = false" x-ref="input" x-init="$watch('editing', val => val && $nextTick(() => $refs.input.focus()))" @if($name) name="{{ $name }}" @endif class="input input-bordered input-sm w-full" />
    {{ $slot }}
</div>
