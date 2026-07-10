@props(['name' => null, 'value' => null])

<div data-slot="time-field" {{ $attributes->merge(['class' => 'time-field join') }}>
    <select @if($name) name="{{ $name }}_hours" @endif class="select select-bordered w-20">
        @for($h = 0; $h <= 23; $h++)
            <option value="{{ sprintf('%02d', $h) }}">{{ sprintf('%02d', $h) }}</option>
        @endfor
    </select>
    <span class="join-item btn btn-disabled no-animation">:</span>
    <select @if($name) name="{{ $name }}_minutes" @endif class="select select-bordered w-20">
        @for($m = 0; $m <= 59; $m += 5)
            <option value="{{ sprintf('%02d', $m) }}">{{ sprintf('%02d', $m) }}</option>
        @endfor
    </select>
    {{ $slot }}
</div>
