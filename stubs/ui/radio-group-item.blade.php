@props(['value' => null, 'label' => null, 'name' => null])

<label data-slot="radio-group-item" {{ $attributes->merge(['class' => 'radio-group-item flex items-center gap-2 cursor-pointer']) }}>
    <input type="radio" @if($value) value="{{ $value }}" @endif @if($name) name="{{ $name }}" @endif x-model="selected" class="radio" />
    @if($label)<span class="text-sm">{{ $label }}</span>@endif
    {{ $slot }}
</label>
