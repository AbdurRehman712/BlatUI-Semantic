@props(['active' => false, 'href' => null])

@if($href)
    <a data-slot="sidebar-item" href="{{ $href }}" {{ $attributes->merge(['class' => 'flex items-center gap-3 px-4 py-3 text-sm rounded-lg transition-colors' . ($active ? ' bg-primary/10 text-primary font-medium' : ' hover:bg-base-200')]) }}>
        {{ $slot }}
    </a>
@else
    <button data-slot="sidebar-item" {{ $attributes->merge(['class' => 'flex items-center gap-3 px-4 py-3 text-sm rounded-lg transition-colors w-full text-left' . ($active ? ' bg-primary/10 text-primary font-medium' : ' hover:bg-base-200')]) }}>
        {{ $slot }}
    </button>
@endif
