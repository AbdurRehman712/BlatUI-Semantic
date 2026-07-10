@props(['href' => null])

<a data-slot="breadcrumb-link" href="{{ $href ?? '#' }}" {{ $attributes->merge(['class' => 'breadcrumb-link']) }}>
    {{ $slot }}
</a>
