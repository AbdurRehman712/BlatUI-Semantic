@props([
    'variant' => 'primary',     // primary, secondary, accent, info, success, warning, error
    'size' => 'md',             // xs, sm, md, lg, xl
    'value' => 0,
    'max' => 100,
    'label' => null,
    'indeterminate' => false,
])

@php
    $classes = 'progress';

    if ($variant) {
        $classes .= " progress-{$variant}";
    }

    if ($size && $size !== 'md') {
        $classes .= " progress-{$size}";
    }
@endphp

@if($label)
    <div class="flex items-center justify-between mb-1">
        <span class="text-sm font-medium">{{ $label }}</span>
        <span class="text-sm text-muted-foreground">{{ $value }}%</span>
    </div>
@endif

<progress
    data-slot="progress"
    @if(!$indeterminate) value="{{ $value }}" @endif
    max="{{ $max }}"
    {{ $attributes->merge(['class' => $classes]) }}
    aria-valuenow="{{ $indeterminate ? null : $value }}"
    aria-valuemin="0"
    aria-valuemax="{{ $max }}"
>
    {{ $value }}%
</progress>
