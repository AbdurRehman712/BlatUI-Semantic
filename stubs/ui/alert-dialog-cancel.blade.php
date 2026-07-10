<button data-slot="alert-dialog-cancel" @click="open = false" {{ $attributes->merge(['class' => 'btn btn-ghost']) }}>
    {{ $slot }}
</button>
