@props(['as' => 'button'])

<{{ $as }} data-slot="context-menu-sub-trigger" {{ $attributes->merge(['class' => 'flex items-center justify-between w-full px-3 py-2 text-sm rounded-lg hover:bg-base-200']) }}>
    {{ $slot }}
    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
</{{ $as }}>
