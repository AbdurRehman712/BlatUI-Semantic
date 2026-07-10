@props(['as' => 'button'])

<{{ $as }} data-slot="collapsible-trigger" @click="open = !open" {{ $attributes->merge(['class' => 'collapsible-trigger flex items-center gap-2 cursor-pointer']) }}>
    {{ $slot }}
</{{ $as }}>
