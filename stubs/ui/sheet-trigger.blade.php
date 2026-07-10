<div data-slot="sheet-trigger" @click="open = true" {{ $attributes->merge(['class' => 'cursor-pointer']) }}>
    {{ $slot }}
</div>
