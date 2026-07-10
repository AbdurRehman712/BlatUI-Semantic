@props(['variants' => [], 'selected' => null, 'name' => null])

<div
    data-slot="variant-selector"
    x-data="{ selected: '{{ $selected ?? ($variants[0] ?? '') }}' }"
    {{ $attributes->merge(['class' => 'variant-selector join']) }}
>
    @foreach($variants as $variant)
        <button
            type="button"
            @click="selected = '{{ $variant }}'"
            :class="selected === '{{ $variant }}' ? 'btn-active' : ''"
            class="join-item btn btn-sm"
        >{{ $variant }}</button>
    @endforeach
    @if($name)<input type="hidden" name="{{ $name }}" x-model="selected" />@endif
    {{ $slot }}
</div>
