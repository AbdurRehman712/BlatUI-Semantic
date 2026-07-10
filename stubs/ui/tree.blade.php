@props(['defaultExpanded' => false])

<ul data-slot="tree" {{ $attributes->merge(['class' => 'tree menu bg-base-200 rounded-box w-full p-2']) }}>
    {{ $slot }}
</ul>
