@props([
    'shadow' => false,
    'bordered' => true,
    'compact' => false,
    'side' => false,
    'title' => null,
    'image' => null,
])

@php
    $classes = 'card';

    if ($shadow) {
        $classes .= ' card-shadow';
    }

    if ($bordered) {
        $classes .= ' card-bordered';
    }

    if ($compact) {
        $classes .= ' card-compact';
    }

    if ($side) {
        $classes .= ' card-side';
    }
@endphp

<div data-slot="card" {{ $attributes->merge(['class' => $classes]) }}>
    @if($image)
        <figure class="card-image">
            <img src="{{ $image }}" alt="{{ $title ?? '' }}" />
        </figure>
    @endif

    @if(isset($header))
        <div class="card-header">
            {{ $header }}
        </div>
    @endif

    <div class="card-body">
        @if($title)
            <h3 class="card-title">{{ $title }}</h3>
        @endif

        {{ $slot }}

        @if(isset($actions))
            <div class="card-actions">
                {{ $actions }}
            </div>
        @endif
    </div>

    @if(isset($footer))
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>
