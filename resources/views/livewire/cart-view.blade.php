<div>
    <ul class="cart_product">
        @forelse(Cart::content() as $product)
        <li>
            <div class="media">
                <a href="#">
                    <img alt="" class="mr-3" src="{{ $product->model->cover_photo }}">
                </a>
                <div class="media-body">
                    {{-- <a> --}}
                    <a href="{{ route('shop.product', ['slug' => $product->model->slug]) }}">
                        <h4>{{ $product->name }}</h4>
                    </a>
                    <h4>
                        <span>{{ $product->qty }} x GHS {{ $product->price }}</span>
                    </h4>
                </div>
            </div>
            <div class="close-circle">
                <a href="#" class="removeFromCart" data-row-id="{{ $product->rowId }}">
                    <i class="ti-trash" aria-hidden="true"></i>
                </a>
            </div>
        </li>
        @empty
        <li>Cart is empty</li>
        @endforelse
    </ul>
    <ul class="cart_total">
        <li>
            <div class="total">
                <h5>subtotal : <span>GHS {{ Cart::total() }}</span></h5>
            </div>
        </li>
        <li>
            <div class="buttons">
                <a href="{{ route('shop.cart') }}" class="btn btn-solid btn-xs view-cart">view cart</a>
                <a href="{{ route('shop.checkout') }}" class="btn btn-solid btn-xs checkout">checkout</a>
            </div>
        </li>
    </ul>
</div>
