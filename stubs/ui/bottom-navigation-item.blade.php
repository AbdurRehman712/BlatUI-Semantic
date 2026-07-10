@props(['active' => false, 'label' => null, 'icon' => null])

<button data-slot="bottom-navigation-item" {{ $attributes->merge(['class' => ($active ? 'active' : '')]) }}>
    @if($icon){{ $icon }}@endif
    @if($label)<span class="btm-nav-label">{{ $label }}</span>@endif
    {{ $slot }}
</button>
