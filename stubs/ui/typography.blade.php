@props(['variant' => 'body', 'as' => null])

@php
    $tags = ['h1' => 'h1', 'h2' => 'h2', 'h3' => 'h3', 'h4' => 'h4', 'body' => 'p', 'lead' => 'p', 'small' => 'small'];
    $classes = ['h1' => 'text-4xl font-bold', 'h2' => 'text-3xl font-bold', 'h3' => 'text-2xl font-semibold', 'h4' => 'text-xl font-semibold', 'body' => 'text-base', 'lead' => 'text-lg text-base-content/80', 'small' => 'text-sm text-base-content/60'];
    $tag = $as ?? $tags[$variant] ?? 'p';
@endphp

<{{ $tag }} data-slot="typography" {{ $attributes->merge(['class' => $classes[$variant] ?? 'text-base']) }}>
    {{ $slot }}
</{{ $tag }}>
