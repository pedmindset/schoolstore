<div class="product-box hover:mt-2 hover:shadow-2xl pb-2  @isset($shadow) shadow-md rounded-md @endisset">
    <div class="img-wrapper">
        <div class="front">
            <a href="{{ route('shop.product', ['slug' => $product->slug]) }}">
                <img src="{{ $product->cover_photo }}" class=" object-contain img-fluid blur-up lazyload bg-img" alt="">
            </a>
        </div>
        <div class="back">
            <a href="{{ route('shop.product', ['slug' => $product->slug]) }}">
                <img src="{{ $product->cover_photo }}" class=" object-contain img-fluid blur-up lazyload bg-img" alt="">
            </a>
        </div>
        <div class="cart-info cart-wrap">
            <button type="button" title="Add to cart" class="addtocart" data-product="{{ $product }}">
                <i class="ti-shopping-cart"></i>
            </button>
            <a href="javascript:void(0)" title="Add to Wishlist">
                <i class="ti-heart" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <div class="product-detail @isset($shadow)  @endisset  px-2">
        <a class="truncate nowrap" href="{{ route('shop.product', ['slug' => $product->slug]) }}">
            <h6 class="truncate nowrap">{{ $product->name }}</h6>
        </a>
        {{-- @if(isset($showDesc))
        <p>{{ $product->description }}</p>
        @endif --}}
        <div class="flex flex-wrap-reverse justify-between">
        <h4 class="text-sm my-1">{{ $product->price_with_currency }}</h4>
        <button type="button" title="Add to cart" class="px-1 my-1 overflow-hidden border rounded-full addtocart text-xs" data-product="{{ $product }}">
            <i class="ti-shopping-cart"> Add to cart</i>
        </button>
        </div>

    </div>
</div>
