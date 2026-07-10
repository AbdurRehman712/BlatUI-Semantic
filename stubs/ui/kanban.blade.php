@props(['columns' => []])

<div data-slot="kanban" {{ $attributes->merge(['class' => 'kanban flex gap-4 overflow-x-auto p-4']) }}>
    @if(count($columns))
        @foreach($columns as $column)
            <div class="kanban-column bg-base-200 rounded-box p-4 min-w-64">
                <h3 class="font-semibold mb-3">{{ $column['title'] ?? '' }}</h3>
                @foreach(($column['items'] ?? []) as $item)
                    <div class="card card-bordered bg-base-100 p-3 mb-2">{{ $item }}</div>
                @endforeach
            </div>
        @endforeach
    @else
        {{ $slot }}
    @endif
</div>
