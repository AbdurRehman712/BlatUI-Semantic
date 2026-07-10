@props(['disabled' => false, 'as' => 'button'])

<{{ $as }} data-slot="menubar-item" {{ $attributes->merge(['class' => 'w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-base-200' . ($disabled ? ' opacity-50 pointer-events-none' : '')]) }}>
    {{ $slot }}
</{{ $as }}>
