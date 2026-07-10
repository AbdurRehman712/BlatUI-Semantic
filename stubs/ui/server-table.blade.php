@props(['url' => null, 'columns' => [], 'perPage' => 10])

<div
    data-slot="server-table"
    x-data="{ loading: true, data: [], page: 1 }"
    x-init="fetch('{{ $url }}?page=' + page).then(r => r.json()).then(d => { data = d.data; loading = false })"
    {{ $attributes->merge(['class' => 'server-table overflow-x-auto rounded-box border border-base-300']) }}
>
    <table class="table">
        @if(count($columns))
            <thead>
                <tr>
                    @foreach($columns as $col)
                        <th>{{ $col['label'] ?? $col }}</th>
                    @endforeach
                </tr>
            </thead>
        @endif
        <tbody>
            <tr x-show="loading"><td colspan="{{ count($columns) }}" class="text-center py-8"><span class="loading loading-spinner"></span></td></tr>
            <template x-for="(row, i) in data" :key="i">
                <tr>
                    @foreach($columns as $col)
                        <td x-text="row['{{ $col['key'] ?? $col }}']"></td>
                    @endforeach
                </tr>
            </template>
        </tbody>
    </table>
    {{ $slot }}
</div>
