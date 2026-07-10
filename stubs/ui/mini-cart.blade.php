@props(['items' => 0, 'total' => null])

<div data-slot="mini-cart" x-data="{ open: false }" {{ $attributes->merge(['class' => 'mini-cart dropdown dropdown-end']) }}>
    <label tabindex="0" @click="open = !open" class="btn btn-ghost btn-circle">
        <div class="indicator">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
            @if($items > 0)<span class="badge badge-sm badge-primary indicator-item">{{ $items }}</span>@endif
        </div>
    </label>
    <div x-show="open" @click.outside="open = false" tabindex="0" class="dropdown-content card card-bordered bg-base-100 w-72 shadow-xl mt-3">
        <div class="card-body">
            {{ $slot }}
            @if($total)<p class="text-right font-semibold">Total: {{ $total }}</p>@endif
        </div>
    </div>
</div>
