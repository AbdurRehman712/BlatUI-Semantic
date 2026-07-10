@props(['href' => null])

<a data-slot="pagination-previous" href="{{ $href ?? '#' }}" {{ $attributes->merge(['class' => 'pagination-previous join-item btn btn-sm']) }}>
    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6"/></svg>
    {{ $slot }}
</a>
