@props(['data' => '{}', 'expandable' => true])

<div data-slot="json-viewer" x-data="{ expanded: {{ $expandable ? 'true' : 'false' }} }" {{ $attributes->merge(['class' => 'json-viewer mockup-code p-4']) }}>
    <pre><code x-text="JSON.stringify(@js($data), null, 2)"></code></pre>
    {{ $slot }}
</div>
