@props(['loading' => false, 'text' => 'Loading...'])

<div
    data-slot="loading-overlay"
    @if($loading) x-data="{ show: true }" x-show="show" @endif
    {{ $attributes->merge(['class' => 'loading-overlay fixed inset-0 z-50 flex items-center justify-center bg-base-100/80 backdrop-blur-sm']) }}
>
    <div class="flex flex-col items-center gap-3">
        <span class="loading loading-spinner loading-lg text-primary"></span>
        @if($text)<p class="text-sm text-base-content/60">{{ $text }}</p>@endif
        {{ $slot }}
    </div>
</div>
