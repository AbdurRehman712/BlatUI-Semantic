@props(['name' => null, 'value' => '#000000'])

<div data-slot="color-picker" x-data="{ color: '{{ $value }}' }" {{ $attributes->merge(['class' => 'color-picker flex items-center gap-2']) }}>
    <input type="color" @if($name) name="{{ $name }}" @endif x-model="color" class="size-10 cursor-pointer rounded-md border border-base-300" />
    <input type="text" x-model="color" class="input input-bordered input-sm w-28" />
    {{ $slot }}
</div>
