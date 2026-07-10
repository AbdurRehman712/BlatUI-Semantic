@props(['disabled' => false, 'as' => 'button'])

<{{ $as }} data-slot="context-menu-item" {{ $attributes->merge(['class' => 'context-menu-item w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-base-200' . ($disabled ? ' opacity-50 pointer-events-none' : '')]) }}>
    {{ $slot }}
</{{ $as }}>
