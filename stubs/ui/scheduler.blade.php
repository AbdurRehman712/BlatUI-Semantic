@props(['events' => []])

<div data-slot="scheduler" {{ $attributes->merge(['class' => 'scheduler rounded-box border border-base-300 overflow-hidden']) }}>
    <table class="table">
        <thead>
            <tr>
                <th>Time</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
