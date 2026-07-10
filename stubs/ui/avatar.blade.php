@props([
    'size' => 'md',
    'src' => null,
    'alt' => null,
    'placeholder' => false,
    'initials' => null,
    'online' => false,
    'offline' => false,
    'badge' => null,
])

@php
    $classes = 'avatar';

    if ($online) {
        $classes .= ' avatar-online';
    }

    if ($offline) {
        $classes .= ' avatar-offline';
    }

    if ($placeholder) {
        $classes .= ' avatar-placeholder';
    }

    if ($size && $size !== 'md') {
        $classes .= " avatar-{$size}";
    }
@endphp

<div data-slot="avatar" {{ $attributes->merge(['class' => $classes]) }}>
    <div class="avatar-ring">
        @if($src)
            <img src="{{ $src }}" alt="{{ $alt ?? '' }}" />
        @elseif($placeholder || $initials)
            <span>{{ $initials ?? '?' }}</span>
        @else
            <span>?</span>
        @endif
    </div>

    @if($badge)
        <span class="badge badge-{{ $badge }} indicator-item">{{ $badge }}</span>
    @endif

    {{ $slot }}
</div>
