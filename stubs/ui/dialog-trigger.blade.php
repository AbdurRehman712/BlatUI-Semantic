<div data-slot="dialog-trigger" @click="open = true" {{ $attributes->merge(['class' => 'cursor-pointer']) }}>
    {{ $slot }}
</div>
