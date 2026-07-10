@props(['value' => null])

<option data-slot="select-item" @if($value) value="{{ $value }}" @endif {{ $attributes }}>
    {{ $slot }}
</option>
