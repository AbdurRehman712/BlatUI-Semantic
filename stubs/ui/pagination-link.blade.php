@props(['href' => null, 'active' => false])

<a data-slot="pagination-link" href="{{ $href ?? '#' }}" {{ $attributes->merge(['class' => 'join-item btn btn-sm' . ($active ? ' btn-active' : '')]) }}>
    {{ $slot }}
</a>
