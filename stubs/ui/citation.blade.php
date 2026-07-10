@props(['source' => null, 'url' => null])

<blockquote data-slot="citation" {{ $attributes->merge(['class' => 'border-l-4 border-primary pl-4 italic']) }}>
    {{ $slot }}
    @if($source)
        <footer class="mt-2 text-sm text-base-content/60">
            — @if($url)<a href="{{ $url }}" class="link link-primary">{{ $source }}</a>@else{{ $source }}@endif
        </footer>
    @endif
</blockquote>
