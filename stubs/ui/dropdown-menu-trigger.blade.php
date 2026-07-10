@props(['as' => 'button'])

<{{ $as }} data-slot="dropdown-menu-trigger" @click="open = !open" {{ $attributes->merge(['class' => 'dropdown-trigger cursor-pointer']) }}>
    {{ $slot }}
</{{ $as }}>
