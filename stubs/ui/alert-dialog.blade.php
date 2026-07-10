@props(['open' => false])

<div
    data-slot="alert-dialog"
    x-data="{ open: {{ $open ? 'true' : 'false' }} }"
    x-show="open"
    x-transition
    @keydown.escape.window="open = false"
    {{ $attributes->merge(['class' => 'alert-dialog fixed inset-0 z-50 flex items-center justify-center']) }}
>
    <div class="fixed inset-0 bg-black/50" @click="open = false" x-show="open" x-transition.opacity></div>
    <div class="modal-box relative z-10 max-w-md" x-show="open" x-transition @click.outside="open = false">
        {{ $slot }}
    </div>
</div>
