@props(['loading' => false, 'color' => 'primary'])

<div
    data-slot="top-progress"
    x-data="{ loading: {{ $loading ? 'true' : 'false' }} }"
    x-show="loading"
    class="fixed top-0 left-0 right-0 z-[9999] h-1"
>
    <div class="h-full bg-{{ $color }} animate-progress"></div>
    {{ $slot }}
</div>
