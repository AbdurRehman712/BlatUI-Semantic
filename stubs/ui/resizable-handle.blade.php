@props(['position' => 'right'])

<div
    data-slot="resizable-handle"
    {{ $attributes->merge(['class' => 'resizable-handle cursor-col-resize w-1.5 bg-base-200 hover:bg-primary transition-colors']) }}
></div>
