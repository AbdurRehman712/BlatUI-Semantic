@props(['value' => null, 'tab' => null])

<button
    data-slot="tabs-trigger"
    @click="activeTab = '{{ $value }}'"
    :class="activeTab === '{{ $value }}' ? 'tab-active' : ''"
    {{ $attributes->merge(['class' => 'tab']) }}
>
    {{ $slot }}
</button>
