@props(['options' => [], 'value' => null])

<div
    data-slot="segmented-control"
    x-data="{ selected: '{{ $value ?? ($options[0] ?? '') }}' }"
    {{ $attributes->merge(['class' => 'segmented-control join']) }}
>
    <template x-for="opt in @js($options)" :key="opt">
        <button type="button" @click="selected = opt" :class="selected === opt ? 'btn-active' : ''" class="join-item btn btn-sm">
            <span x-text="opt"></span>
        </button>
    </template>
    {{ $slot }}
</div>
