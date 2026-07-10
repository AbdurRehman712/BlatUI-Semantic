@props(['src' => null])

<div data-slot="audio-player" {{ $attributes->merge(['class' => 'audio-player']) }}>
    @if($src)
        <audio src="{{ $src }}" controls class="w-full"></audio>
    @endif
    {{ $slot }}
</div>
