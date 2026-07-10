@props(['active' => false, 'label' => null, 'icon' => null])

<button data-slot="dock-item" {{ $attributes->merge(['class' => 'dock-item' . ($active ? ' dock-active' : '')]) }}>
    @if($icon){{ $icon }}@endif
    @if($label)<span>{{ $label }}</span>@endif
    {{ $slot }}
</button>
