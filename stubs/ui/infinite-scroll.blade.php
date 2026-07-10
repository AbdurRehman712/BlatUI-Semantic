@props(['threshold' => 200, 'loading' => false])

<div
    data-slot="infinite-scroll"
    x-data="{ loading: {{ $loading ? 'true' : 'false' }} }"
    x-intersect:enter.margin.{{ $threshold }}px="loading = true; $dispatch('load-more')"
    {{ $attributes }}
>
    {{ $slot }}
    <div x-show="loading" class="flex justify-center py-4">
        <span class="loading loading-spinner loading-md"></span>
    </div>
</div>
