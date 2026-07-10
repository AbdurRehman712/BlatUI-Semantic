@props(['href' => null])

<a data-slot="pagination-next" href="{{ $href ?? '#' }}" {{ $attributes->merge(['class' => 'pagination-next join-item btn btn-sm']) }}>
    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
    {{ $slot }}
</a>
