@props(['language' => null, 'code' => null])

<div data-slot="code-block" {{ $attributes->merge(['class' => 'mockup-code']) }}>
    @if($language)<div class="code-language badge badge-ghost text-xs absolute top-2 right-2">{{ $language }}</div>@endif
    @if($code)<pre><code>{{ $code }}</code></pre>@else{{ $slot }}@endif
</div>
