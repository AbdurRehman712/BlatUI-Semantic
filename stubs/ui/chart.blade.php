@props(['type' => 'line', 'data' => '[]', 'options' => '{}'])

<div data-slot="chart" x-data="{ chart: null }" x-init="chart = new Chart($el.querySelector('canvas'), { type: '{{ $type }}', data: {{ $data }}, options: {{ $options }} })" {{ $attributes->merge(['class' => 'chart']) }}>
    <canvas></canvas>
    {{ $slot }}
</div>
