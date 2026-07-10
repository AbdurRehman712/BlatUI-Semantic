@props(['author' => null, 'source' => null])

<figure data-slot="quote" {{ $attributes->merge(['class' => 'quote border-l-4 border-primary pl-4 py-2']) }}>
    <blockquote class="italic text-base-content/80">
        {{ $slot }}
    </blockquote>
    @if($author)
        <figcaption class="mt-2 text-sm text-base-content/50">
            — {{ $author }}
            @if($source), <cite>{{ $source }}</cite>@endif
        </figcaption>
    @endif
</figure>
