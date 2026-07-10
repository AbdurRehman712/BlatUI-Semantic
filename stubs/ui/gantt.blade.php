@props(['tasks' => [], 'startDate' => null, 'endDate' => null])

<div data-slot="gantt" x-data="{ tasks: @js($tasks) }" {{ $attributes->merge(['class' => 'gantt overflow-x-auto rounded-box border border-base-300']) }}>
    <table class="table">
        <thead>
            <tr>
                <th>Task</th>
                <th>Start</th>
                <th>End</th>
            </tr>
        </thead>
        <tbody>
            @if(count($tasks))
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task['name'] ?? '' }}</td>
                        <td>{{ $task['start'] ?? '' }}</td>
                        <td>{{ $task['end'] ?? '' }}</td>
                    </tr>
                @endforeach
            @else
                {{ $slot }}
            @endif
        </tbody>
    </table>
</div>
