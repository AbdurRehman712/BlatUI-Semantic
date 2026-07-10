@props([
    'title' => null,
    'value' => null,
    'desc' => null,
    'figure' => null,
    'actions' => null,
])

<div data-slot="stat" {{ $attributes->merge(['class' => 'stat']) }}>
    @if($figure)
        <div class="stat-figure">{{ $figure }}</div>
    @endif

    @if($title)
        <div class="stat-title">{{ $title }}</div>
    @endif

    @if($value)
        <div class="stat-value">{{ $value }}</div>
    @endif

    @if($desc)
        <div class="stat-desc">{{ $desc }}</div>
    @endif

    @if(isset($actions))
        <div class="stat-actions">{{ $actions }}</div>
    @endif

    {{ $slot }}
</div>
