<button data-slot="carousel-next" {{ $attributes->merge(['class' => 'btn btn-circle btn-ghost']) }}>
    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
    {{ $slot }}
</button>
