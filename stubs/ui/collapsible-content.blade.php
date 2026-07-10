<div data-slot="collapsible-content" x-show="open" x-collapse {{ $attributes->merge(['class' => 'collapsible-content']) }}>
    {{ $slot }}
</div>
