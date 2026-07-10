@props(['active' => false])

<button data-slot="pagination-item" {{ $attributes->merge(['class' => 'join-item btn btn-sm' . ($active ? ' btn-active' : '')]) }}>
    {{ $slot }}
</button>
