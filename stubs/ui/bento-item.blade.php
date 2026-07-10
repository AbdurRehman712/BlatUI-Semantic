@props(['colSpan' => 1])

<div data-slot="bento-item" {{ $attributes->merge(['class' => 'bento-item card card-bordered p-4' . ($colSpan > 1 ? ' md:col-span-' . $colSpan : '')]) }}>
    {{ $slot }}
</div>
