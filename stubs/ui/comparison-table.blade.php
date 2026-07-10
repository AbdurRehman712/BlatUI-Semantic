@props(['headers' => [], 'rows' => []])

<div data-slot="comparison-table" {{ $attributes->merge(['class' => 'overflow-x-auto rounded-box border border-base-300']) }}>
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
            @if(count($rows))
                @foreach($rows as $row)
                    <tr>
                        @foreach($row as $cell)
                            <td>{{ $cell }}</td>
                        @endforeach
                    </tr>
                @endforeach
            @else
                {{ $slot }}
            @endif
        </tbody>
    </table>
</div>
