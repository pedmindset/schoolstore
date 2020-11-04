<div class="product-box">
    <div class="img-wrapper">
        <div class="front">
            <a href="{{ route('shop.product', ['slug' => $product->slug]) }}">
                <img src="{{ $product->cover_photo }}" class="img-fluid blur-up lazyload bg-img" alt="">
            </a>
        </div>
        <div class="back">
            <a href="{{ route('shop.product', ['slug' => $product->slug]) }}">
                <img src="{{ $product->cover_photo }}" class="img-fluid blur-up lazyload bg-img" alt="">
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
    <div class="product-detail">
        <a href="{{ route('shop.product', ['slug' => $product->slug]) }}">
            <h6>{{ $product->name }}</h6>
        </a>
        @if(isset($showDesc))
        <p>{{ $product->description }}</p>
        @endif
        <h4>{{ $product->price_with_currency }}</h4>
    </div>
</div>