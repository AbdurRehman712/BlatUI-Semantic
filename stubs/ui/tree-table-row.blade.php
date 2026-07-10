@props(['depth' => 0, 'expanded' => false])

<tr data-slot="tree-table-row" x-data="{ expanded: {{ $expanded ? 'true' : 'false' }}, children: false }" {{ $attributes }} :style="'padding-left: ' + ({{ $depth }} * 20) + 'px'">
    {{ $slot }}
</tr>
