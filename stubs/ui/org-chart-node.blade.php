@props(['label' => null, 'role' => null, 'children' => []])

<li data-slot="org-chart-node" {{ $attributes->merge(['class' => 'org-chart-node']) }}>
    <div class="card card-bordered bg-base-100 p-3 mb-2 min-w-40">
        @if($label)<div class="font-medium text-sm">{{ $label }}</div>@endif
        @if($role)<div class="text-xs text-base-content/50">{{ $role }}</div>@endif
        {{ $slot }}
    </div>
    @if(count($children))
        <ul class="ml-6 mt-2 space-y-2">
            @foreach($children as $child)
                <li class="text-sm">{{ $child }}</li>
            @endforeach
        </ul>
    @endif
</li>
