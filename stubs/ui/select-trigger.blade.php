@props(['name' => null, 'placeholder' => 'Select an option'])

<select @if($name) name="{{ $name }}" @endif {{ $attributes->merge(['class' => 'select select-bordered w-full']) }}>
    <option value="" disabled selected>{{ $placeholder }}</option>
    {{ $slot }}
</select>
