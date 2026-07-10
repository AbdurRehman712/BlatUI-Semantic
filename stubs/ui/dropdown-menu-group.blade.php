@props([
    'label' => null,
])

<div data-slot="dropdown-menu-group" {{ $attributes->merge(['class' => 'py-1']) }}>
    @if($label)
        <div class="px-3 py-1 text-xs font-medium text-muted-foreground uppercase tracking-wide">{{ $label }}</div>
    @endif
    {{ $slot }}
</div>
