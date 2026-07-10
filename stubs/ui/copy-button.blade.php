@props(['text' => null, 'label' => 'Copy'])

<button
    data-slot="copy-button"
    x-data="{ copied: false }"
    @click="navigator.clipboard.writeText('{{ $text }}'); copied = true; setTimeout(() => copied = false, 2000)"
    {{ $attributes->merge(['class' => 'btn btn-ghost btn-sm']) }}
>
    <span x-show="!copied">{{ $label }}</span>
    <span x-show="copied" class="text-success">Copied!</span>
    {{ $slot }}
</button>
