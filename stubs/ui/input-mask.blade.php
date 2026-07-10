@props(['name' => null, 'mask' => null, 'placeholder' => null])

<div data-slot="input-mask" x-data="{ mask: '{{ $mask }}' }">
    <input
        type="text"
        @if($name) name="{{ $name }}" @endif
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        x-on:input="
            let val = $event.target.value.replace(/\D/g, '');
            let formatted = '';
            let idx = 0;
            for (let ch of (mask || '{{ $mask }}')) {
                if (idx >= val.length) break;
                if (ch === '9') { formatted += val[idx++]; }
                else { formatted += ch; }
            }
            $event.target.value = formatted;
        "
        {{ $attributes->merge(['class' => 'input input-bordered w-full']) }}
    />
    {{ $slot }}
</div>
