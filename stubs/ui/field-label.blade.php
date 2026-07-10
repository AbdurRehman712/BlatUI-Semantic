@props(['for' => null, 'required' => false])

<label data-slot="field-label" @if($for) for="{{ $for }}" @endif {{ $attributes->merge(['class' => 'field-label label-text font-medium' . ($required ? ' after:content-[\'*\'] after:text-error after:ml-0.5' : '')]) }}>
    {{ $slot }}
</label>
