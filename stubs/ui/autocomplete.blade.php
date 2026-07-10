@props(['items' => []])

<div data-slot="autocomplete" x-data="{ open: false, query: '' }" {{ $attributes->merge(['class' => 'dropdown w-full']) }}>
    <input type="text" x-model="query" @focus="open = true" @click.outside="open = false" class="input input-bordered w-full" />
    <div x-show="open" class="dropdown-content">
        {{ $slot }}
    </div>
</div>
