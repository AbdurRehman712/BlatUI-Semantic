@props(['src' => null, 'poster' => null, 'controls' => true, 'autoplay' => false, 'loop' => false])

<video
    data-slot="video"
    src="{{ $src }}"
    @if($poster) poster="{{ $poster }}" @endif
    @if($controls) controls @endif
    @if($autoplay) autoplay @endif
    @if($loop) loop @endif
    {{ $attributes->merge(['class' => 'video rounded-box w-full']) }}
>{{ $slot }}</video>
