@props(['placeholder' => 'Type a command or search...'])

<div data-slot="command-input" {{ $attributes->merge(['class' => 'command-input relative']) }}>
    <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 -translate-y-1/2 size-4 text-base-content/40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
    <input type="text" x-model="query" placeholder="{{ $placeholder }}" class="input input-bordered w-full pl-10" />
    {{ $slot }}
</div>
