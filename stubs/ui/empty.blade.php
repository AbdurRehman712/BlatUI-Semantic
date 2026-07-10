@props(['title' => null, 'description' => null, 'icon' => null])

<div data-slot="empty" {{ $attributes->merge(['class' => 'empty-state flex flex-col items-center justify-center py-12 px-4 text-center']) }}>
    @if($icon)<div class="mb-4 text-base-content/30">{{ $icon }}</div>@endif
    @if($title)<h3 class="text-lg font-semibold mb-2">{{ $title }}</h3>@endif
    @if($description)<p class="text-sm text-base-content/60 mb-4">{{ $description }}</p>@endif
    {{ $slot }}
</div>
