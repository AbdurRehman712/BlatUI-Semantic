@props(['name' => null, 'args' => '{}', 'result' => null])

<div data-slot="tool-call" {{ $attributes->merge(['class' => 'tool-call bg-base-200 rounded-box p-4 border border-base-300']) }}>
    <div class="flex items-center gap-2 mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
        @if($name)<code class="text-sm font-mono">{{ $name }}</code>@endif
    </div>
    @if($args && $args !== '{}')
        <pre class="text-xs bg-base-300 rounded p-2 overflow-x-auto mb-2">Arguments: {{ is_string($args) ? $args : json_encode($args, JSON_PRETTY_PRINT) }}</pre>
    @endif
    @if($result)
        <pre class="text-xs text-success bg-base-300 rounded p-2 overflow-x-auto">Result: {{ $result }}</pre>
    @endif
    {{ $slot }}
</div>
