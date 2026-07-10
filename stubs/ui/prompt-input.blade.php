@props(['name' => null, 'placeholder' => 'Type your message...', 'sendLabel' => 'Send'])

<div data-slot="prompt-input" {{ $attributes->merge(['class' => 'prompt-input join w-full']) }}>
    <textarea
        @if($name) name="{{ $name }}" @endif
        placeholder="{{ $placeholder }}"
        rows="1"
        class="join-item textarea textarea-bordered w-full resize-none"
    ></textarea>
    <button type="submit" class="join-item btn btn-primary">{{ $sendLabel }}</button>
    {{ $slot }}
</div>
