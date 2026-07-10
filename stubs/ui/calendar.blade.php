@props(['value' => null, 'locale' => 'en'])

<div data-slot="calendar" x-data="{ date: '{{ $value }}' }" {{ $attributes->merge(['class' => 'card card-bordered p-4 w-fit']) }}>
    <div class="flex items-center justify-between mb-4">
        <button @click="date = ''" class="btn btn-ghost btn-sm">&lsaquo;</button>
        <span class="font-semibold" x-text="'{{ now()->format('F Y') }}'"></span>
        <button @click="date = ''" class="btn btn-ghost btn-sm">&rsaquo;</button>
    </div>
    {{ $slot }}
    <div class="grid grid-cols-7 gap-1 text-center text-sm">
        @foreach(['Mo','Tu','We','Th','Fr','Sa','Su'] as $day)
            <span class="text-base-content/50">{{ $day }}</span>
        @endforeach
    </div>
</div>
