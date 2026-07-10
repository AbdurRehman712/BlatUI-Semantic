@props(['length' => 6, 'name' => null, 'value' => ''])

<div
    data-slot="input-otp"
    x-data="{ otp: Array({{ $length }}).fill(''), focus: 0 }"
    {{ $attributes->merge(['class' => 'input-otp flex gap-2']) }}
>
    <template x-for="(_, i) in otp" :key="i">
        <input
            type="text"
            maxlength="1"
            x-model="otp[i]"
            :ref="'otp-' + i"
            @input="if($event.target.value) { const next = i + 1; if(next < {{ $length }}) { $nextTick(() => $refs['otp-' + next][0].focus()); } }"
            @keydown.backspace="if(!otp[i] && i > 0) { $nextTick(() => $refs['otp-' + (i-1)][0].focus()) }"
            class="input input-bordered w-10 h-12 text-center"
        />
    </template>
    @if($name)<input type="hidden" name="{{ $name }}" :value="otp.join('')" />@endif
    {{ $slot }}
</div>
