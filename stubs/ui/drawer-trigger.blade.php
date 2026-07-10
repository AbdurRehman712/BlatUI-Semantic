<div data-slot="drawer-trigger" @click="open = true" {{ $attributes->merge(['class' => 'cursor-pointer']) }}>
    {{ $slot }}
</div>
