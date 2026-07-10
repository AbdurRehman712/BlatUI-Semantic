@props(['position' => 'bottom-right'])

<div
    data-slot="sonner"
    x-data="{
        toasts: [],
        addToast(msg, type) { this.toasts.push({ id: Date.now(), message: msg, type: type }); setTimeout(() => this.toasts = this.toasts.filter(t => t.id !== this.toasts[this.toasts.length-1].id), 4000) },
        removeToast(id) { this.toasts = this.toasts.filter(t => t.id !== id) }
    }"
    {{ $attributes->merge(['class' => 'sonner fixed z-[9999] ' . ($position === 'bottom-right' ? 'bottom-4 right-4' : $position === 'bottom-left' ? 'bottom-4 left-4' : $position === 'top-right' ? 'top-4 right-4' : 'top-4 left-4') . ' space-y-2 w-80']) }}
>
    <template x-for="toast in toasts" :key="toast.id">
        <div class="alert shadow-lg" :class="'alert-' + toast.type" x-show="toast" x-transition>
            <span x-text="toast.message"></span>
            <button @click="removeToast(toast.id)" class="btn btn-ghost btn-xs">✕</button>
        </div>
    </template>
    {{ $slot }}
</div>
