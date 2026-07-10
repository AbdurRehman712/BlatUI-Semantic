@props(['current' => 1, 'steps' => []])

<div
    data-slot="stepper"
    x-data="{ current: {{ $current }} }"
    {{ $attributes->merge(['class' => 'stepper steps']) }}
>
    @if(count($steps))
        @foreach($steps as $i => $step)
            <div class="step" :class="current > {{ $i + 1 }} ? 'step-primary' : (current === {{ $i + 1 }} ? 'step-primary' : '')">
                @if(is_string($step)){{ $step }}@endif
            </div>
        @endforeach
    @else
        {{ $slot }}
    @endif
</div>
