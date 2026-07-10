@props(['value' => null, 'selected' => false])

<button type="button" data-slot="command-item" @click="query = '{{ $value }}'; open = false" {{ $attributes->merge(['class' => 'command-item w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-base-200' . ($selected ? ' bg-primary/10' : '')]) }}>
    {{ $slot }}
</button>
