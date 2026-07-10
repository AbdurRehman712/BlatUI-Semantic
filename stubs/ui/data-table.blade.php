@props(['headers' => [], 'rows' => [], 'searchable' => false, 'paginated' => false])

<div
    data-slot="data-table"
    x-data="{ search: '', page: 1 }"
    {{ $attributes->merge(['class' => 'data-table overflow-x-auto rounded-box border border-base-300']) }}
>
    @if($searchable)
        <div class="p-4 border-b border-base-200">
            <input type="text" x-model="search" placeholder="Search..." class="input input-bordered input-sm w-full max-w-xs" />
        </div>
    @endif
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
    @if($paginated)
        <div class="flex justify-between items-center p-4 border-t border-base-200">
            <button @click="page = Math.max(1, page - 1)" class="btn btn-ghost btn-sm">Previous</button>
            <span class="text-sm" x-text="'Page ' + page"></span>
            <button @click="page++" class="btn btn-ghost btn-sm">Next</button>
        </div>
    @endif
</div>
