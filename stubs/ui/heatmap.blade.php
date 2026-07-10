@props(['data' => '[]'])

<div data-slot="heatmap" x-data="{ data: @js($data) }" {{ $attributes->merge(['class' => 'heatmap rounded-box border border-base-300 p-4']) }}>
    <div class="grid grid-flow-col gap-1">
        <template x-for="(value, index) in data" :key="index">
            <div
                :style="'background: hsl(' + (100 - value * 10) + ', 70%, 50%)'"
                class="size-4 rounded"
                :title="'Value: ' + value"
            ></div>
        </template>
    </div>
    {{ $slot }}
</div>
