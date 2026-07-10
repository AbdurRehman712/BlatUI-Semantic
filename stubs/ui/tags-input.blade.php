@props(['name' => null, 'placeholder' => 'Type and press enter...'])

<div
    data-slot="tags-input"
    x-data="{ tags: [], input: '' }"
    {{ $attributes->merge(['class' => 'tags-input input input-bordered w-full flex flex-wrap gap-1 items-center px-2 py-1.5 h-auto min-h-[2.5rem]']) }}
>
    <template x-for="(tag, i) in tags" :key="i">
        <span class="badge badge-ghost gap-1">
            <span x-text="tag"></span>
            <button type="button" @click="tags = tags.filter((_, idx) => idx !== i)" class="text-base-content/50 hover:text-error">&times;</button>
        </span>
    </template>
    <input type="text" x-model="input" @keydown.enter.prevent="if(input.trim()) { tags.push(input.trim()); input = '' }" @keydown.backspace="if(!input && tags.length) tags.pop()" placeholder="{{ $placeholder }}" class="flex-1 min-w-[120px] outline-none bg-transparent text-sm" />
    @if($name)<template x-for="(tag, i) in tags" :key="i"><input type="hidden" :name="'{{ $name }}[]'" x-model="tags[i]" /></template>@endif
    {{ $slot }}
</div>
