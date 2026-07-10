@props(['href' => null, 'active' => false])

<li data-slot="navigation-menu-item" {{ $attributes->merge(['class' => ($active ? 'bordered' : '')]) }}>
    @if($href)
        <a href="{{ $href }}" class="{{ $active ? 'active' : '' }}">{{ $slot }}</a>
    @else
        {{ $slot }}
    @endif
</li>
