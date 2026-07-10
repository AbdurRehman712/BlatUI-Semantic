@props(['name' => null, 'fields' => [], 'min' => 0, 'max' => 10])

<div
    data-slot="repeater"
    x-data="{ items: [@for($i = 0; $i < max(1, $min); $i++){ '' }@if($i < max(1, $min) - 1),@endif @endfor] }"
    {{ $attributes->merge(['class' => 'repeater space-y-2']) }}
>
    <template x-for="(item, idx) in items" :key="idx">
        <div class="flex gap-2">
            <input type="text" @if($name) :name="'{{ $name }}[' + idx + ']'" @endif x-model="items[idx]" class="input input-bordered w-full input-sm" />
            <button type="button" @click="items.splice(idx, 1)" x-show="items.length > {{ $min }}" class="btn btn-ghost btn-sm">✕</button>
        </div>
    </template>
    <button type="button" @click="items.push('')" x-show="items.length < {{ $max }}" class="btn btn-outline btn-sm">+ Add</button>
    {{ $slot }}
</div>
