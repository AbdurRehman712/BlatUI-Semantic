@props(['variant' => 'bordered', 'size' => 'md'])

<div data-slot="tabs-list" {{ $attributes->merge(['class' => 'tabs tabs-' . $variant . ' tabs-' . $size]) }}>
    {{ $slot }}
</div>
