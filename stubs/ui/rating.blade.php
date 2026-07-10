@props([
    'size' => 'md',          // xs, sm, md, lg
    'half' => false,
    'name' => 'rating',
    'value' => 0,
    'max' => 5,
    'count' => 5,
])

@php
    $classes = 'rating';

    if ($half) {
        $classes .= ' rating-half';
    }

    if ($size && $size !== 'md') {
        $classes .= " rating-{$size}";
    }
@endphp

<div data-slot="rating" {{ $attributes->merge(['class' => $classes]) }} x-data x-init>
    @if($half)
        <input type="radio" name="{{ $name }}" class="rating-hidden" value="0" />
        @for($i = 1; $i <= $count; $i++)
            <input
                type="radio"
                name="{{ $name }}"
                value="{{ $i - 0.5 }}"
                @if(($value ?? 0) == $i - 0.5) checked @endif
                class="mask mask-star-2"
            />
            <input
                type="radio"
                name="{{ $name }}"
                value="{{ $i }}"
                @if(($value ?? 0) == $i) checked @endif
                class="mask mask-star-2"
            />
        @endfor
    @else
        <input type="radio" name="{{ $name }}" class="rating-hidden" value="0" />
        @for($i = 1; $i <= $count; $i++)
            <input
                type="radio"
                name="{{ $name }}"
                value="{{ $i }}"
                @if(($value ?? 0) == $i) checked @endif
                class="mask mask-star-2"
            />
        @endfor
    @endif

    {{ $slot }}
</div>
