@props([
    'text' => null,
    'alt' => null,
    'for' => null,
])

<label
    data-slot="label"
    @if($for) for="{{ $for }}" @endif
    {{ $attributes->merge(['class' => 'label']) }}
>
    @if($text)
        <span class="label-text">{{ $text }}</span>
    @endif
    {{ $slot }}
    @if(isset($alt))
        <span class="label-text-alt">{{ $alt }}</span>
    @endif
</label>
