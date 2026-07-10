@props(['name' => null, 'id' => null, 'placeholder' => null, 'rows' => 4])

<div data-slot="autosize-textarea" x-data="{ resize: (el) => { el.style.height = 'auto'; el.style.height = el.scrollHeight + 'px'; } }">
    <textarea
        data-slot="textarea"
        x-init="resize($el)"
        @input="resize($el)"
        @if($name) name="{{ $name }}" @endif
        @if($id) id="{{ $id }}" @endif
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        rows="{{ $rows }}"
        {{ $attributes->merge(['class' => 'textarea textarea-bordered w-full']) }}
    >{{ $slot }}</textarea>
</div>
