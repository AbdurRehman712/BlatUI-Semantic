@props(['ratio' => '16/9'])

<div data-slot="aspect-ratio" style="aspect-ratio: {{ $ratio }};" {{ $attributes->merge(['class' => 'overflow-hidden rounded-xl']) }}>
    {{ $slot }}
</div>
