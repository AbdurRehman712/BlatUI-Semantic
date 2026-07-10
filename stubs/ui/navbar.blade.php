@props([
    'sticky' => false,
])

<div
    data-slot="navbar"
    {{ $attributes->merge(['class' => 'navbar' . ($sticky ? ' sticky top-0 z-30' : '')]) }}
>
    @if(isset($start))
        <div class="navbar-start">
            {{ $start }}
        </div>
    @elseif($slot->isNotEmpty())
        <div class="navbar-start">
            {{ $slot }}
        </div>
    @endif

    @if(isset($center))
        <div class="navbar-center">
            {{ $center }}
        </div>
    @endif

    @if(isset($end))
        <div class="navbar-end">
            {{ $end }}
        </div>
    @endif
</div>
