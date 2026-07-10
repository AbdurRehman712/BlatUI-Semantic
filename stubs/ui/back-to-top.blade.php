<button data-slot="btn" {{ $attributes->merge(['class' => 'btn btn-ghost btn-square btn-sm']) }}>
    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
    {{ $slot }}
</button>
