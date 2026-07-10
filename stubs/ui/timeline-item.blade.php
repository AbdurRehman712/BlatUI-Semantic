@props([
    'start' => null,
    'end' => null,
    'pin' => null,
])

<li data-slot="timeline-item" {{ $attributes->merge(['class' => 'timeline-item']) }}>
    @if($start)
        <div class="timeline-start">{{ $start }}</div>
    @endif

    <div class="timeline-middle">
        <div class="timeline-pin"></div>
        {{ $slot }}
    </div>

    @if($end)
        <div class="timeline-end">{{ $end }}</div>
    @endif
</li>
