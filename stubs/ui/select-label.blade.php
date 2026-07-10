@props(['for' => null])

<label data-slot="select-label" @if($for) for="{{ $for }}" @endif {{ $attributes->merge(['class' => 'label-text']) }}>
    {{ $slot }}
</label>
