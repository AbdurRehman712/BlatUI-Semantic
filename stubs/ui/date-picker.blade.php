@props(['name' => null, 'value' => null])

<div data-slot="date-picker" x-data="{ open: false, date: '{{ $value }}' }" {{ $attributes->merge(['class' => 'date-picker dropdown w-full']) }}>
    <input type="date" @if($name) name="{{ $name }}" @endif @if($value) value="{{ $value }}" @endif x-model="date" :class="'input input-bordered w-full'" />
    {{ $slot }}
</div>
