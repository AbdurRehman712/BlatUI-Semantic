@props(['title' => 'Terminal'])

<div data-slot="terminal" {{ $attributes->merge(['class' => 'mockup-code']) }}>
    <div class="flex items-center justify-between px-4 py-2 border-b border-base-300">
        <div class="flex gap-1.5">
            <span class="size-3 rounded-full bg-error"></span>
            <span class="size-3 rounded-full bg-warning"></span>
            <span class="size-3 rounded-full bg-success"></span>
        </div>
        @if($title)<span class="text-xs text-base-content/50">{{ $title }}</span>@endif
        <div></div>
    </div>
    <pre class="px-4 py-3">{{ $slot }}</pre>
</div>
