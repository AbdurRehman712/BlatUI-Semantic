<div data-slot="sidebar-content" {{ $attributes->merge(['class' => 'sidebar-content drawer-side z-40']) }}>
    <label for="sidebar-drawer" class="drawer-overlay"></label>
    {{ $slot }}
</div>
