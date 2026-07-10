<div
    data-slot="hover-card-content"
    x-show="open"
    x-transition
    {{ $attributes->merge(['class' => 'absolute z-50 w-72 p-4 bg-base-100 rounded-box shadow-xl border border-base-200']) }}
>
    {{ $slot }}
</div>
