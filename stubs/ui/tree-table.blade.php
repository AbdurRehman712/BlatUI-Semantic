@props(['headers' => []])

<div data-slot="tree-table" {{ $attributes->merge(['class' => 'tree-table overflow-x-auto rounded-box border border-base-300']) }}>
    <table class="table">
        @if(count($headers))
            <thead>
                <tr>
                    @foreach($headers as $header)
                        <th>{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>
        @endif
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
