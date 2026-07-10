@props(['name' => null, 'logo' => null])

<a data-slot="brand" {{ $attributes->merge(['class' => 'flex items-center gap-2 text-xl font-semibold']) }}>
    @if($logo)<img src="{{ $logo }}" alt="{{ $name }}" class="h-8 w-auto" />@endif
    @if($name)<span>{{ $name }}</span>@endif
    {{ $slot }}
</a>
