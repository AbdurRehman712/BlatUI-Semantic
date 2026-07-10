<button data-slot="drawer-close" @click="open = false" {{ $attributes->merge(['class' => 'btn btn-ghost btn-sm']) }}>
    {{ $slot }}
</button>
