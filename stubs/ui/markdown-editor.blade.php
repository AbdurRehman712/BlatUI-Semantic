@props(['name' => null, 'value' => '', 'preview' => false])

<div data-slot="markdown-editor" x-data="{ content: '{{ $value }}', preview: {{ $preview ? 'true' : 'false' }} }" {{ $attributes->merge(['class' => 'markdown-editor rounded-box border border-base-300 overflow-hidden']) }}>
    <div class="flex border-b border-base-200 bg-base-200 p-1 gap-1">
        <button type="button" @click="preview = false" :class="!preview ? 'bg-base-100' : ''" class="btn btn-ghost btn-xs">Edit</button>
        <button type="button" @click="preview = true" :class="preview ? 'bg-base-100' : ''" class="btn btn-ghost btn-xs">Preview</button>
    </div>
    <textarea x-show="!preview" @if($name) name="{{ $name }}" @endif x-model="content" rows="12" class="textarea textarea-bordered w-full rounded-none border-0"></textarea>
    <div x-show="preview" class="p-4 prose max-w-none" x-html="marked(content)">{{ $slot }}</div>
</div>
