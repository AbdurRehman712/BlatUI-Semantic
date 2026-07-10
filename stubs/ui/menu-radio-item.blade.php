@props(['value' => null, 'name' => null])

<label data-slot="menu-radio-item" {{ $attributes->merge(['class' => 'flex items-center gap-2 px-3 py-2 text-sm rounded-lg hover:bg-base-200 cursor-pointer']) }}>
    <input type="radio" @if($value) value="{{ $value }}" @endif @if($name) name="{{ $name }}" @endif class="radio radio-xs" />
    {{ $slot }}
</label>
