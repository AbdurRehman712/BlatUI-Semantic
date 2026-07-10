@props(['data' => []])

<div data-slot="org-chart" {{ $attributes->merge(['class' => 'org-chart flex justify-center']) }}>
    <ul class="menu bg-base-200 rounded-box p-4">
        {{ $slot }}
    </ul>
</div>
