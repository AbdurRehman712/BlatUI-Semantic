@props(['status' => 'offline'])

<span data-slot="presence" {{ $attributes->merge(['class' => 'presence badge badge-xs badge-' . ($status === 'online' ? 'success' : $status === 'away' ? 'warning' : 'ghost') . ' p-1.5']) }}>
    {{ $slot }}
</span>
