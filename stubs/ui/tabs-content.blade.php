@props(['value' => null])

<div data-slot="tabs-content" x-show="activeTab === '{{ $value }}'" {{ $attributes->merge(['class' => 'tabs-content py-4']) }}>
    {{ $slot }}
</div>
