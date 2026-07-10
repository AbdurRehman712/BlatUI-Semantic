<button data-slot="dialog-close" @click="open = false" {{ $attributes->merge(['class' => 'btn btn-ghost btn-sm absolute top-2 right-2']) }}>
    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
    {{ $slot }}
</button>
