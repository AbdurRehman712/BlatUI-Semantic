@props(['name' => null])

<fieldset data-slot="field-set" {{ $attributes->merge(['class' => 'field-set border border-base-300 rounded-box p-4']) }}>
    {{ $slot }}
</fieldset>
