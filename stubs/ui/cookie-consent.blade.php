@props(['position' => 'bottom', 'acceptLabel' => 'Accept', 'declineLabel' => 'Decline'])

<div
    data-slot="cookie-consent"
    x-data="{ show: !localStorage.getItem('cookie-consent') }"
    x-show="show"
    x-transition
    {{ $attributes->merge(['class' => 'cookie-consent fixed z-50 p-4 ' . ($position === 'bottom' ? 'bottom-0 left-0 right-0' : 'top-0 left-0 right-0') . ' bg-base-200 border-t border-base-300']) }}
>
    <div class="container mx-auto flex flex-col sm:flex-row items-center gap-4">
        <p class="flex-1 text-sm">{{ $slot }}</p>
        <div class="flex gap-2">
            <button @click="localStorage.setItem('cookie-consent', 'true'); show = false" class="btn btn-primary btn-sm">{{ $acceptLabel }}</button>
            <button @click="show = false" class="btn btn-ghost btn-sm">{{ $declineLabel }}</button>
        </div>
    </div>
</div>
