@props(['title' => null, 'description' => null, 'icon' => null, 'accent' => false])

<div data-slot="spotlight-card" {{ $attributes->merge(['class' => 'card card-bordered bg-base-100 shadow-sm hover:shadow-xl transition-shadow duration-300' . ($accent ? ' ring-2 ring-primary' : '')]) }}>
    <div class="card-body">
        @if($icon)<div class="text-primary mb-2">{{ $icon }}</div>@endif
        @if($title)<h3 class="card-title">{{ $title }}</h3>@endif
        @if($description)<p class="text-sm text-base-content/60">{{ $description }}</p>@endif
        {{ $slot }}
    </div>
</div>
