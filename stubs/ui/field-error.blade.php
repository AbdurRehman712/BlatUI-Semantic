@props(['name' => null])

<p data-slot="field-error" @if($name) x-data x-show="$el.closest('form')?.querySelector('[name=\'{{ $name }}\']')?.matches(':user-invalid') || $el.closest('[data-invalid]')" @endif {{ $attributes->merge(['class' => 'field-error text-sm text-error mt-1']) }}>
    {{ $slot }}
</p>
