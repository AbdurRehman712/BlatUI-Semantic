@props(['amount' => 0, 'currency' => 'USD', 'period' => null, 'original' => null])

<div data-slot="price" {{ $attributes->merge(['class' => 'price flex items-baseline gap-1']) }}>
    <span class="text-xs text-base-content/50">{{ $currency === 'USD' ? '$' : $currency . ' ' }}</span>
    <span class="text-3xl font-bold">{{ number_format($amount, 2) }}</span>
    @if($period)<span class="text-xs text-base-content/50">/{{ $period }}</span>@endif
    @if($original)<span class="text-sm text-base-content/30 line-through">{{ $currency === 'USD' ? '$' : $currency . ' ' }}{{ number_format($original, 2) }}</span>@endif
    {{ $slot }}
</div>
