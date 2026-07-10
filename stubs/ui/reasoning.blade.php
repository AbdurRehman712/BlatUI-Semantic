@props(['label' => 'Reasoning'])

<details data-slot="reasoning" {{ $attributes->merge(['class' => 'reasoning bg-base-200 rounded-box p-4']) }}>
    <summary class="cursor-pointer text-sm font-medium text-base-content/70">{{ $label }}</summary>
    <div class="mt-3 text-sm text-base-content/60">
        {{ $slot }}
    </div>
</details>
