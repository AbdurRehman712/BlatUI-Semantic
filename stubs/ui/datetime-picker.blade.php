@props(['name' => null, 'value' => null])

<div data-slot="datetime-picker" x-data="{ open: false, date: '{{ $value }}' }" {{ $attributes->merge(['class' => 'datetime-picker w-full']) }}>
    <input type="datetime-local" @if($name) name="{{ $name }}" @endif @if($value) value="{{ $value }}" @endif x-model="date" class="input input-bordered w-full" />
    {{ $slot }}
</div>
