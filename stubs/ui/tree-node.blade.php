@props(['label' => null, 'expanded' => false])

<li data-slot="tree-node" x-data="{ expanded: {{ $expanded ? 'true' : 'false' }} }">
    <details {{ $expanded ? 'open' : '' }}>
        <summary @click="expanded = !expanded" class="cursor-pointer">
            @if($label){{ $label }}@else{{ $slot }}@endif
        </summary>
        <ul>
            {{ $slot }}
        </ul>
    </details>
</li>
