@props(['name' => null, 'value' => null, 'placeholder' => '+1 (555) 000-0000'])

<div data-slot="phone-input" {{ $attributes->merge(['class' => 'phone-input join w-full']) }}>
    <span class="join-item btn btn-disabled no-animation w-14">🇺🇸</span>
    <input
        type="tel"
        @if($name) name="{{ $name }}" @endif
        @if($value) value="{{ $value }}" @endif
        placeholder="{{ $placeholder }}"
        class="join-item input input-bordered w-full"
    />
    {{ $slot }}
</div>
