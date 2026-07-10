@props(['orientation' => 'horizontal', 'defaultSize' => 50])

<div
    data-slot="resizable"
    x-data="{ size: {{ $defaultSize }} }"
    {{ $attributes->merge(['class' => 'resizable flex' . ($orientation === 'vertical' ? ' flex-col' : '') . ' relative']) }}
    :style="$orientation === 'vertical' ? 'height: ' + size + '%' : 'width: ' + size + '%'"
>
    {{ $slot }}
</div>
