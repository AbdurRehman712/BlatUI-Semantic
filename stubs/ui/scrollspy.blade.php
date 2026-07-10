@props(['sections' => []])

<div data-slot="scrollspy" x-data="{ active: '' }" @scroll.window="active = '{{ count($sections) ? $sections[0] : '' }}'" {{ $attributes->merge(['class' => 'scrollspy']) }}>
    <nav class="menu menu-horizontal bg-base-200 rounded-box p-1 gap-1">
        @foreach($sections as $section)
            <a href="#{{ Str::slug($section) }}" class="text-sm px-3 py-1.5 rounded-lg hover:bg-base-300" :class="active === '{{ $section }}' ? 'bg-base-300' : ''">{{ $section }}</a>
        @endforeach
    </nav>
    {{ $slot }}
</div>
