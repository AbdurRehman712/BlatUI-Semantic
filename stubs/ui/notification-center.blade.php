@props(['count' => 0])

<div data-slot="notification-center" x-data="{ open: false }" {{ $attributes->merge(['class' => 'notification-center dropdown dropdown-end']) }}>
    <label tabindex="0" @click="open = !open" class="btn btn-ghost btn-circle">
        <div class="indicator">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
            @if($count > 0)<span class="badge badge-sm badge-error indicator-item">{{ $count }}</span>@endif
        </div>
    </label>
    <div x-show="open" @click.outside="open = false" tabindex="0" class="dropdown-content card card-bordered bg-base-100 w-80 shadow-xl mt-3 max-h-96 overflow-y-auto">
        <div class="card-body p-4">
            {{ $slot }}
        </div>
    </div>
</div>
