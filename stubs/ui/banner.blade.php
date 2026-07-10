@props(['variant' => 'info', 'dismissible' => false])

<div
    data-slot="banner"
    {{ $attributes->merge(['class' => 'alert alert-' . $variant . ' rounded-none']) }}
    @if($dismissible) x-data="{ show: true }" x-show="show" @endif
>
    {{ $slot }}
    @if($dismissible)
        <button @click="show = false" class="btn btn-ghost btn-xs">✕</button>
    @endif
</div>
