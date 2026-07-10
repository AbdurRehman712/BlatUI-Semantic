@props(['name' => null, 'checked' => false, 'value' => '1', 'label' => null])

<label data-slot="switch" {{ $attributes->merge(['class' => 'flex items-center gap-3 cursor-pointer']) }}>
    <input type="checkbox" @if($checked) checked @endif @if($name) name="{{ $name }}" @endif value="{{ $value }}" class="toggle" />
    @if($label)<span class="text-sm">{{ $label }}</span>@endif
    {{ $slot }}
</label>
