@props([
    'zebra' => false,
    'pinRows' => false,
    'pinCols' => false,
    'size' => 'md',
])

@php
    $classes = 'table';

    if ($zebra) {
        $classes .= ' table-zebra';
    }

    if ($pinRows) {
        $classes .= ' table-pin-rows';
    }

    if ($pinCols) {
        $classes .= ' table-pin-cols';
    }

    if ($size && $size !== 'md') {
        $classes .= " table-{$size}";
    }
@endphp

<div class="overflow-x-auto">
    <table data-slot="table" {{ $attributes->merge(['class' => $classes]) }}>
        @if(isset($header))
            <thead>
                {{ $header }}
            </thead>
        @endif

        <tbody>
            {{ $slot }}
        </tbody>

        @if(isset($footer))
            <tfoot>
                {{ $footer }}
            </tfoot>
        @endif
    </table>
</div>
