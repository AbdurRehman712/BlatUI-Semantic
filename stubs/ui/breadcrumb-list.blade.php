@props(['items' => []])

<ol data-slot="breadcrumb-list" {{ $attributes->merge(['class' => 'breadcrumbs']) }}>
    {{ $slot }}
</ol>
