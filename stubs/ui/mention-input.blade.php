@props(['name' => null, 'placeholder' => 'Type @ to mention...', 'suggestions' => []])

<div
    data-slot="mention-input"
    x-data="{ query: '', open: false }"
    {{ $attributes->merge(['class' => 'mention-input relative']) }}
>
    <textarea
        @if($name) name="{{ $name }}" @endif
        x-model="query"
        @input="open = query.includes('@')"
        placeholder="{{ $placeholder }}"
        rows="3"
        class="textarea textarea-bordered w-full"
    ></textarea>
    <ul x-show="open" @click.outside="open = false" class="absolute bottom-full left-0 mb-2 w-56 menu bg-base-100 shadow-xl rounded-box border border-base-200 max-h-40 overflow-y-auto">
        @if(count($suggestions))
            @foreach($suggestions as $suggestion)
                <li @click="query = query.replace(/@\w*$/, '{{ $suggestion }} '); open = false" class="px-3 py-2 text-sm hover:bg-base-200 cursor-pointer">{{ $suggestion }}</li>
            @endforeach
        @endif
        {{ $slot }}
    </ul>
</div>
