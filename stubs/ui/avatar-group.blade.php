@props(['size' => 'md'])

<div data-slot="avatar-group" {{ $attributes->merge(['class' => 'avatar-group -space-x-6']) }}>
    {{ $slot }}
</div>
