@props(['name' => null, 'value' => ''])

<div data-slot="rich-text-editor" x-data="{ content: '{{ $value }}' }" {{ $attributes->merge(['class' => 'rich-text-editor rounded-box border border-base-300 overflow-hidden']) }}>
    <div class="flex gap-1 p-2 border-b border-base-200 bg-base-200">
        <button type="button" @click="document.execCommand('bold')" class="btn btn-ghost btn-xs">B</button>
        <button type="button" @click="document.execCommand('italic')" class="btn btn-ghost btn-xs italic">I</button>
        <button type="button" @click="document.execCommand('underline')" class="btn btn-ghost btn-xs underline">U</button>
        <span class="w-px bg-base-300 mx-1"></span>
        <button type="button" @click="document.execCommand('insertUnorderedList')" class="btn btn-ghost btn-xs">• List</button>
    </div>
    <div contenteditable="true" x-init="$el.innerHTML = content" @input="content = $el.innerHTML" class="min-h-32 p-4 focus:outline-none prose max-w-none"></div>
    @if($name)<input type="hidden" name="{{ $name }}" x-model="content" />@endif
    {{ $slot }}
</div>
