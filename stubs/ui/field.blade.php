@props(['name' => null, 'label' => null, 'help' => null, 'error' => null])

<div data-slot="field" {{ $attributes->merge(['class' => 'form-control w-full']) }}>
    @if($label)<label for="{{ $name }}" class="label"><span class="label-text">{{ $label }}</span></label>@endif
    {{ $slot }}
    @if($help)<label class="label"><span class="label-text-alt text-base-content/60">{{ $help }}</span></label>@endif
    @if($error)<label class="label"><span class="label-text-alt text-error">{{ $error }}</span></label>@endif
</div>
