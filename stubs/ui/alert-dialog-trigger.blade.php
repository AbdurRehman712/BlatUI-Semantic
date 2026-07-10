<div data-slot="alert-dialog-trigger" @click="open = true" {{ $attributes->merge(['class' => 'cursor-pointer']) }}>
    {{ $slot }}
</div>
