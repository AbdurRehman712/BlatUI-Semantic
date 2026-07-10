@props(['data' => 'https://example.com', 'size' => 200])

<div data-slot="qr-code" x-data="{ src: '' }" x-init="src = 'https://api.qrserver.com/v1/create-qr-code/?size={{ $size }}x{{ $size }}&data=' + encodeURIComponent('{{ $data }}')" {{ $attributes->merge(['class' => 'qr-code inline-block']) }}>
    <img :src="src" width="{{ $size }}" height="{{ $size }}" alt="QR Code" class="rounded-box" />
    {{ $slot }}
</div>
