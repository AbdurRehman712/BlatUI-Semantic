@props(['label' => null])

<div data-slot="description-item" {{ $attributes->merge(['class' => 'description-item flex flex-col gap-1']) }}>
    @if($label)<dt class="text-sm text-base-content/50">{{ $label }}</dt>@endif
    <dd>{{ $slot }}</dd>
</div>
