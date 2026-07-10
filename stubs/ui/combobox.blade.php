@props(['items' => [], 'name' => null, 'placeholder' => 'Search...'])

<div
    data-slot="combobox"
    x-data="{ open: false, query: '', selected: null }"
    {{ $attributes->merge(['class' => 'combobox dropdown w-full']) }}
>
    <input
        type="text"
        @if($name) name="{{ $name }}" @endif
        x-model="query"
        @focus="open = true"
        @click.outside="open = false"
        placeholder="{{ $placeholder }}"
        class="input input-bordered w-full"
    />
    <ul x-show="open" x-transition class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-full z-50">
        {{ $slot }}
    </ul>
</div>
