<div>
    @include('partials.alert')
    <div class="checkout-details">
        <div class="order-box">
            <div class="title-box">
                <div>Product <span>Total</span></div>
            </div>
            <ul class="qty">
                @forelse(Cart::content() as $product)
                <li>{{ $product->name }} × {{ $product->qty }} <span>GHS {{ $product->price }}</span></li>
                @empty
                <li>Cart is empty</li>
                @endforelse
            </ul>
            <ul class="sub-total">
                {{-- <li>Subtotal <span class="count">GHS {{ Cart::total() }}</span></li> --}}
                {{-- <li>Shipping
                    <div class="shipping">
                        <div class="shopping-option">
                            <input type="checkbox" name="free-shipping" id="free-shipping">
                            <label for="free-shipping">Free Shipping</label>
                        </div>
                        <div class="shopping-option">
                            <input type="checkbox" name="local-pickup" id="local-pickup">
                            <label for="local-pickup">Local Pickup</label>
                        </div>
                    </div>
                </li> --}}
            </ul>
            <ul class="total">
                <li>Total <span class="count">GHS {{ Cart::total() }}</span></li>
            </ul>
        </div>
        <div class="payment-box">
            <div class="upper-box">
                {{-- <div class="payment-options">
                    <ul>
                        <li>
                            <div class="radio-option">
                                <input type="radio" name="payment-group" id="payment-1"
                                    checked="checked">
                                <label for="payment-1">Check Payments<span
                                        class="small-text">Please send a check to Store
                                        Name, Store Street, Store Town, Store State /
                                        County, Store Postcode.</span></label>
                            </div>
                        </li>
                        <li>
                            <div class="radio-option">
                                <input type="radio" name="payment-group" id="payment-2">
                                <label for="payment-2">Cash On Delivery<span
                                        class="small-text">Please send a check to Store
                                        Name, Store Street, Store Town, Store State /
                                        County, Store Postcode.</span></label>
                            </div>
                        </li>
                        <li>
                            <div class="radio-option paypal">
                                <input type="radio" name="payment-group" id="payment-3">
                                <label for="payment-3">PayPal<span class="image"><img
                                            src="{{ asset('images/paypal.png') }}"
                                            alt=""></span></label>
                            </div>
                        </li>
                    </ul>
                </div> --}}
            </div>
            <div class="text-right"><button type="button" class="btn-solid btn" wire:click="placeOrder()">Place Order</button></div>
        </div>
    </div>
</div>
