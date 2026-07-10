@props(['open' => false])

<div
    data-slot="command-dialog"
    x-data="{ open: {{ $open ? 'true' : 'false' }} }"
    x-show="open"
    x-transition
    @keydown.escape.window="open = false"
    {{ $attributes->merge(['class' => 'command-dialog fixed inset-0 z-50 flex items-start justify-center pt-[15vh]']) }}
>
    <div class="fixed inset-0 bg-black/50" @click="open = false"></div>
    <div class="modal-box p-0 max-w-lg w-full" @click.outside="open = false">
        {{ $slot }}
    </div>
</div>
