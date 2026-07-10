@props(['title' => null, 'description' => null])

<div data-slot="page-header" {{ $attributes->merge(['class' => 'page-header mb-6']) }}>
    @if($title)<h1 class="text-2xl font-bold">{{ $title }}</h1>@endif
    @if($description)<p class="text-sm text-base-content/60 mt-1">{{ $description }}</p>@endif
    {{ $slot }}
</div>
