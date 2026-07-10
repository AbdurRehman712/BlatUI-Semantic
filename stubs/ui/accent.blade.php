@props(['variant' => null])

<span data-slot="badge" {{ $attributes->merge(['class' => 'badge badge-' . ($variant ?? 'primary')]) }}>
    {{ $slot }}
</span>
