@props(['value' => null, 'label' => null])

<button
    type="button"
    data-slot="toggle-group-item"
    @click="selected = '{{ $value }}'"
    :class="selected === '{{ $value }}' ? 'btn-active' : ''"
    {{ $attributes->merge(['class' => 'join-item btn btn-sm']) }}
>
    @if($label){{ $label }}@else{{ $slot }}@endif
</button>
