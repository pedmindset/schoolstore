<div>
    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table cart-table table-responsive-xs">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col">quantity</th>
                                <th scope="col">action</th>
                                <th scope="col">total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(Cart::content() as $product)
                            <tr>
                                <td>
                                    <a href="{{ route('shop.product', ['slug' => $product->model->slug]) }}"><img src="{{ $product->model->cover_photo }}" alt=""></a>
                                </td>
                                <td>
                                    <a href="{{ route('shop.product', ['slug' => $product->model->slug]) }}">{{ $product->name }}</a>
                                    <div class="mobile-cart-content row">
                                        <div class="col-xs-3">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="text" name="quantity" class="form-control input-number"
                                                        value="{{ $product->qty }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <h2 class="td-color">GHS {{ $product->price }}</h2>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="close-circle">
                                                <a href="#" class="removeFromCart" data-row-id="{{ $product->rowId }}">
                                                    <i class="ti-trash" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2>GHS {{ $product->price }}</h2>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <input type="number" name="quantity" class="form-control input-number"
                                                value="{{ $product->qty }}" wire:change="updateCartQty({{ $product->id }}, $event.target.value)">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="close-circle">
                                        <a href="#" class="removeFromCart" data-row-id="{{ $product->rowId }}">
                                            <i class="ti-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <h2 class="td-color">GHS {{ $product->price }}</h2>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="6" ><p class="text-center">Cart is empty</p></td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    <table class="table cart-table table-responsive-md">
                        <tfoot>
                            <tr>
                                <td>total price :</td>
                                <td>
                                    <h2>GHS {{ Cart::total() }}</h2>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row cart-buttons">
                <div class="col-6"><a href="{{ route('shop.products') }}" class="btn btn-solid">continue shopping</a></div>
                <div class="col-6"><a href="{{ route('shop.checkout') }}" class="btn btn-solid">check out</a></div>
            </div>
        </div>
    </section>
</div>
