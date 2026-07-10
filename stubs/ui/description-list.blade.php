@props(['layout' => 'vertical'])

<dl data-slot="description-list" {{ $attributes->merge(['class' => 'description-list' . ($layout === 'horizontal' ? ' sm:grid sm:grid-cols-2 gap-4' : ' space-y-4')]) }}>
    {{ $slot }}
</dl>
