@props([
    'legend' => null,
    'help' => null,
])

<fieldset data-slot="fieldset" {{ $attributes->merge(['class' => 'fieldset']) }}>
    @if($legend)
        <legend class="fieldset-legend">{{ $legend }}</legend>
    @endif

    {{ $slot }}

    @if($help)
        <p class="fieldset-label">{{ $help }}</p>
    @endif
</fieldset>
