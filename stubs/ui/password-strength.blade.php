@props(['name' => null, 'placeholder' => 'Password'])

<div
    data-slot="password-strength"
    x-data="{ val: '', strength: 0 }"
    {{ $attributes->merge(['class' => 'password-strength']) }}
>
    <input
        type="password"
        @if($name) name="{{ $name }}" @endif
        x-model="val"
        @input="strength = Math.min(4, Math.floor(val.length / 3))"
        placeholder="{{ $placeholder }}"
        class="input input-bordered w-full"
    />
    <div class="flex gap-1 mt-2 h-1.5">
        <template x-for="i in 4" :key="i">
            <div
                class="flex-1 rounded-full transition-colors duration-200"
                :class="i <= strength ? (strength <= 1 ? 'bg-error' : strength <= 2 ? 'bg-warning' : strength <= 3 ? 'bg-info' : 'bg-success') : 'bg-base-200'"
            ></div>
        </template>
    </div>
    {{ $slot }}
</div>
