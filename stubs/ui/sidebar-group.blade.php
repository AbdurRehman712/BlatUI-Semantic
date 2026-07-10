@props(['label' => null])

<div data-slot="sidebar-group" {{ $attributes->merge(['class' => 'sidebar-group']) }}>
    @if($label)<span class="px-4 py-2 text-xs font-semibold text-base-content/50 uppercase tracking-wider">{{ $label }}</span>@endif
    {{ $slot }}
</div>
