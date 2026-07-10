@props(['trigger' => 'click'])

<div
    data-slot="confetti"
    x-data="{ show: false }"
    @if($trigger === 'click') @click="show = true; setTimeout(() => show = false, 2000)" @endif
    {{ $attributes }}
>
    {{ $slot }}
    <template x-teleport="body">
        <div x-show="show" x-transition.opacity.duration.1000ms class="fixed inset-0 pointer-events-none z-[9999]">
            <div class="confetti-piece bg-primary"></div>
            <div class="confetti-piece bg-secondary"></div>
            <div class="confetti-piece bg-accent"></div>
        </div>
    </template>
</div>
