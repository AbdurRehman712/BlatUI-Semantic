@props(['image' => null, 'title' => null, 'price' => null, 'rating' => null])

<div data-slot="product-card" {{ $attributes->merge(['class' => 'card card-bordered bg-base-100 shadow-sm']) }}>
    @if($image)<figure><img src="{{ $image }}" alt="{{ $title }}" class="w-full h-48 object-cover" /></figure>@endif
    <div class="card-body">
        @if($title)<h3 class="card-title">{{ $title }}</h3>@endif
        @if($price)<p class="text-xl font-bold">{{ $price }}</p>@endif
        @if($rating)<div class="rating rating-sm">@for($i = 1; $i <= 5; $i++)<input type="radio" class="mask mask-star-2 bg-warning" @if($i <= $rating) checked @endif />@endfor</div>@endif
        <div class="card-actions justify-end mt-2">
            {{ $slot }}
        </div>
    </div>
</div>
