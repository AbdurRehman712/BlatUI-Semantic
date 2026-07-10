@props(['checked' => false])

<label data-slot="menubar-checkbox-item" {{ $attributes->merge(['class' => 'flex items-center gap-2 px-3 py-2 text-sm rounded-lg hover:bg-base-200 cursor-pointer']) }}>
    <input type="checkbox" @if($checked) checked @endif class="checkbox checkbox-xs" />
    {{ $slot }}
</label>
