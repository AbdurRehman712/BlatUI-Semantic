@props(['role' => 'user', 'message' => null, 'time' => null])

<div data-slot="chat-message" {{ $attributes->merge(['class' => 'chat chat-' . ($role === 'user' ? 'end' : 'start')]) }}>
    @if($message)<div class="chat-bubble">{{ $message }}</div>@endif
    {{ $slot }}
    @if($time)<div class="chat-footer text-xs opacity-50">{{ $time }}</div>@endif
</div>
