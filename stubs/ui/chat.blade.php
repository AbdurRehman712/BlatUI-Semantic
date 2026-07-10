@props([
    'position' => 'start',       // start, end
    'image' => null,
    'header' => null,
    'variant' => null,           // primary, secondary, accent, info, success, warning, error
    'outline' => false,
    'footer' => null,
])

@php
    $classes = 'chat';

    $classes .= " chat-{$position}";

    $bubbleClasses = 'chat-bubble';
    if ($variant) {
        $bubbleClasses .= " chat-bubble-{$variant}";
    }
    if ($outline) {
        $bubbleClasses .= ' chat-bubble-outline';
    }
@endphp

<div data-slot="chat" {{ $attributes->merge(['class' => $classes]) }}>
    @if($image)
        <div class="chat-image">
            <img src="{{ $image }}" alt="Avatar" />
        </div>
    @endif

    @if($header)
        <div class="chat-header">{{ $header }}</div>
    @endif

    <div class="{{ $bubbleClasses }}">
        {{ $slot }}
    </div>

    @if($footer)
        <div class="chat-footer">{{ $footer }}</div>
    @endif
</div>
