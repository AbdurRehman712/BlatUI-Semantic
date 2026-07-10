@props(['heading' => null])

<div data-slot="command-group" {{ $attributes->merge(['class' => 'command-group menu bg-base-100']) }}>
    @if($heading)<li class="menu-title">{{ $heading }}</li>@endif
    {{ $slot }}
</div>
