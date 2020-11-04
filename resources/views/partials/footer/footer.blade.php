    <!-- footer -->
    <footer class="footer-light">
        <!-- newsletter -->
        @include('partials.footer.newsletter')
        <!--- newsletter end -->
        <section class="section-b-space light-layout">
            <div class="container">
                <div class="row footer-theme partition-f">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-title footer-mobile-title">
                            <h4>about</h4>
                        </div>
                        <div class="footer-contant">
                            <div class="footer-logo"><img src="{{ asset('images/icon/logo.png') }}" alt=""></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col offset-xl-1">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>my account</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="#">mens</a></li>
                                    <li><a href="#">womens</a></li>
                                    <li><a href="#">clothing</a></li>
                                    <li><a href="#">accessories</a></li>
                                    <li><a href="#">featured</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>why we choose</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="#">shipping & return</a></li>
                                    <li><a href="#">secure shopping</a></li>
                                    <li><a href="#">gallary</a></li>
                                    <li><a href="#">affiliates</a></li>
                                    <li><a href="#">contacts</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>store information</h4>
                            </div>
                            <div class="footer-contant">
                                <ul class="contact-list">
                                    <li><i class="fa fa-map-marker"></i>Multikart Demo Store, Demo store India 345-659
                                    </li>
                                    <li><i class="fa fa-phone"></i>Call Us: 123-456-7898</li>
                                    <li><i class="fa fa-envelope-o"></i>Email Us: <a href="#">Support@Fiot.com</a></li>
                                    <li><i class="fa fa-fax"></i>Fax: 123456</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Copyright & Social Media -->
        @include('partials.footer.copyrights')
        <!-- Copyright & Social Media end -->
    </footer>
    <!-- footer end -->
    <!-- tap to top -->
    <div class="tap-top top-cls">
        <div>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
    <!-- tap to top end -->


    <!-- cart start -->
   <div class="addcart_btm_popup" id="fixed_cart_icon">
        <a href="javascript:void(0)" onclick="openCart()" class="fixed_cart">
            <i class="ti-shopping-cart"></i>
        </a>
    </div>
    <!-- cart end -->

    <!--modal popup start-->
    {{-- <div class="modal fade bd-example-modal-lg theme-modal" id="exampleModal" tabindex="-1" role="dialog"
       aria-hidden="true">
       <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-body modal1">
                   <div class="container-fluid p-0">
                       <div class="row">
                           <div class="col-12">
                               <div class="modal-bg">
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                           aria-hidden="true">&times;</span></button>
                                   <div class="offer-content"> <img src="{{ asset('images/Offer-banner.png') }}"
                                           class="img-fluid blur-up lazyload" alt="">
                                       <h2>newsletter</h2>
                                       <form
                                           action="https://pixelstrap.us19.list-manage.com/subscribe/post?u=5a128856334b598b395f1fc9b&amp;id=082f74cbda"
                                           class="auth-form needs-validation" method="post"
                                           id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                           target="_blank">
                                           <div class="form-group mx-sm-3">
                                               <input type="email" class="form-control" name="EMAIL" id="mce-EMAIL"
                                                   placeholder="Enter your email" required="required">
                                               <button type="submit" class="btn btn-solid"
                                                   id="mc-submit">subscribe</button>
                                           </div>
                                       </form>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </div> --}}
   <!--modal popup end-->


   <!-- Quick-view modal popup start-->
   <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog"
       aria-hidden="true">
       <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
           <div class="modal-content quick-view-modal">
               <div class="modal-body">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                           aria-hidden="true">&times;</span></button>
                   <div class="row">
                       <div class="col-lg-6 col-xs-12">
                           <div class="quick-view-img"><img src="{{ asset('images/pro3/1.jpg') }}" alt=""
                                   class="img-fluid blur-up lazyload"></div>
                       </div>
                       <div class="col-lg-6 rtl-text">
                           <div class="product-right">
                               <h2>Women Pink Shirt</h2>
                               <h3>$32.96</h3>
                               <ul class="color-variant">
                                   <li class="bg-light0"></li>
                                   <li class="bg-light1"></li>
                                   <li class="bg-light2"></li>
                               </ul>
                               <div class="border-product">
                                   <h6 class="product-title">product details</h6>
                                   <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium
                                       doloremque laudantium</p>
                               </div>
                               <div class="product-description border-product">
                                   <div class="size-box">
                                       <ul>
                                           <li class="active"><a href="#">s</a></li>
                                           <li><a href="#">m</a></li>
                                           <li><a href="#">l</a></li>
                                           <li><a href="#">xl</a></li>
                                       </ul>
                                   </div>
                                   <h6 class="product-title">quantity</h6>
                                   <div class="qty-box">
                                       <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                   class="btn quantity-left-minus" data-type="minus" data-field=""><i
                                                       class="ti-angle-left"></i></button> </span>
                                           <input type="text" name="quantity" class="form-control input-number"
                                               value="1"> <span class="input-group-prepend"><button type="button"
                                                   class="btn quantity-right-plus" data-type="plus" data-field=""><i
                                                       class="ti-angle-right"></i></button></span></div>
                                   </div>
                               </div>
                               <div class="product-buttons"><a href="#" class="btn btn-solid">add to cart</a> <a
                                       href="#" class="btn btn-solid">view detail</a></div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- Quick-view modal popup end-->


   <!-- exit modal popup start-->
   {{-- <div class="modal fade bd-example-modal-lg theme-modal exit-modal" id="exit_popup" tabindex="-1" role="dialog"
       aria-hidden="true">
       <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-body modal1">
                   <div class="container-fluid p-0">
                       <div class="row">
                           <div class="col-12">
                               <div class="modal-bg">
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                                   <div class="media">
                                       <img src="{{ asset('images/stop.png') }}"
                                           class="stop img-fluid blur-up lazyload mr-3" alt="">
                                       <div class="media-body text-left align-self-center">
                                           <div>
                                               <h2>wait!</h2>
                                               <h4>We want to give you
                                                   <b>10% discount</b>
                                                   <span>for your first order</span>
                                               </h4>
                                               <h5>Use discount code at checkout</h5>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div> --}}
   <!-- Add to cart modal popup end-->

    <!-- Add to cart modal popup start-->
    <div class="modal fade bd-example-modal-lg theme-modal cart-modal" id="addtocart" tabindex="-1" role="dialog"
            aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body modal1">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="modal-bg addtocart">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="media">
                                        <a href="#">
                                            <img class="img-fluid blur-up lazyload pro-img"
                                                src="{{ asset('images/fashion/product/43.jpg') }}" alt="">
                                        </a>
                                        <div class="media-body align-self-center text-center">
                                            <a href="#">
                                                <h6>
                                                    <i class="fa fa-check"></i>Item
                                                    <span>men full sleeves</span>
                                                    <span> successfully added to your Cart</span>
                                                </h6>
                                            </a>
                                            <div class="buttons">
                                                <a href="#" class="view-cart btn btn-solid">Your cart</a>
                                                <a href="#" class="checkout btn btn-solid">Check out</a>
                                                <a href="#" class="continue btn btn-solid">Continue shopping</a>
                                            </div>

                                            <div class="upsell_payment">
                                                <img src="{{ asset('images/payment_cart.png') }}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-section">
                                        <div class="col-12 product-upsell text-center">
                                            <h4>Customers who bought this item also.</h4>
                                        </div>
                                        <div class="row" id="upsell_product">
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="{{ asset('images/fashion/product/1.jpg') }}"
                                                                class="img-fluid blur-up lazyload mb-1"
                                                                alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>cotton top</span></a></h6>
                                                        <h4><span>$25</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="{{ asset('images/fashion/product/34.jpg') }}"
                                                                class="img-fluid blur-up lazyload mb-1"
                                                                alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>cotton top</span></a></h6>
                                                        <h4><span>$25</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="{{ asset('images/fashion/product/13.jpg') }}"
                                                                class="img-fluid blur-up lazyload mb-1"
                                                                alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>cotton top</span></a></h6>
                                                        <h4><span>$25</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="{{ asset('images/fashion/product/19.jpg') }}"
                                                                class="img-fluid blur-up lazyload mb-1"
                                                                alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>cotton top</span></a></h6>
                                                        <h4><span>$25</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add to cart modal popup end-->

     <!-- Add to cart bar -->
     <div id="cart_side" class=" add_to_cart right">
        <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
        <div class="cart-inner">
            <div class="cart_top">
                <h3>my cart</h3>
                <div class="close-cart">
                    <a href="javascript:void(0)" onclick="closeCart()">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="cart_media">
                {{-- <ul class="cart_product">
                    @forelse(Cart::content() as $product)
                    <li>
                        <div class="media">
                            <a href="#">
                                <img alt="" class="mr-3" src="{{ $product->model->cover_photo }}">
                            </a>
                            <div class="media-body">
                                <a href="{{ route('shop.product', ['slug' => $product->model->slug]) }}">
                                    <h4>{{ $product->name }}</h4>
                                </a>
                                <h4>
                                    <span>{{ $product->qty }} x GHS {{ $product->price }}</span>
                                </h4>
                            </div>
                        </div>
                        <div class="close-circle">
                            <a href="{{ route('shop.remove-from-cart', [$product->rowId]) }}">
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
                            <a href="cart.html" class="btn btn-solid btn-xs view-cart">view cart</a>
                            <a href="#" class="btn btn-solid btn-xs checkout">checkout</a>
                        </div>
                    </li>
                </ul> --}}
                <livewire:cart-view-livewire />
            </div>
        </div>
    </div>
    <!-- Add to cart bar end-->
