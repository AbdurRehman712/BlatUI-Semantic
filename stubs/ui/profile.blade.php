@props(['name' => null, 'role' => null, 'avatar' => null, 'bio' => null])

<div data-slot="profile" {{ $attributes->merge(['class' => 'profile card card-bordered bg-base-100 p-6 text-center']) }}>
    @if($avatar)
        <div class="avatar mx-auto mb-4">
            <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                <img src="{{ $avatar }}" alt="{{ $name }}" />
            </div>
        </div>
    @endif
    @if($name)<h3 class="text-xl font-semibold">{{ $name }}</h3>@endif
    @if($role)<p class="text-sm text-base-content/60 mb-3">{{ $role }}</p>@endif
    @if($bio)<p class="text-sm mb-4">{{ $bio }}</p>@endif
    <div class="flex justify-center gap-2">
        {{ $slot }}
    </div>
</div>
