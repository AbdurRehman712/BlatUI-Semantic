@props(['label' => null, 'description' => null, 'value' => null, 'active' => false])

<li data-slot="item" {{ $attributes->merge(['class' => 'py-2' . ($active ? ' active' : '')]) }}>
    @if($label || $description)
        <div>
            @if($label)<div class="font-medium">{{ $label }}</div>@endif
            @if($description)<div class="text-xs text-base-content/50">{{ $description }}</div>@endif
        </div>
    @endif
    @if($value)<span class="text-base-content/60">{{ $value }}</span>@endif
    {{ $slot }}
</li>
