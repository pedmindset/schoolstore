@extends('layouts.admin')

@section('title', 'Products')

@section('loader')
    @include('partials.header.shop_loader')
@endsection

@section('content')
    <x-breadcrumb/>
    <!-- section start -->
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 collection-filter">
                        <!-- side-bar colleps block stat -->
                        {{-- <div class="collection-filter-block">
                            <!-- brand filter start -->
                            <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                                        aria-hidden="true"></i> back</span></div>
                            
                            <!-- price filter start here -->
                            <div class="collection-collapse-block border-0 open">
                                <h3 class="collapse-block-title">price</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                        <div class="custom-control custom-checkbox collection-filter-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="hundred">
                                            <label class="custom-control-label" for="hundred">$10 - $100</label>
                                        </div>
                                        <div class="custom-control custom-checkbox collection-filter-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="twohundred">
                                            <label class="custom-control-label" for="twohundred">$100 - $200</label>
                                        </div>
                                        <div class="custom-control custom-checkbox collection-filter-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="threehundred">
                                            <label class="custom-control-label" for="threehundred">$200 - $300</label>
                                        </div>
                                        <div class="custom-control custom-checkbox collection-filter-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="fourhundred">
                                            <label class="custom-control-label" for="fourhundred">$300 - $400</label>
                                        </div>
                                        <div class="custom-control custom-checkbox collection-filter-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="fourhundredabove">
                                            <label class="custom-control-label" for="fourhundredabove">$400
                                                above</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- silde-bar colleps block end here -->
                        <!-- side-bar single product slider start -->
                        <div class="theme-card">
                            <h5 class="title-border">featured products</h5>
                            <div class="offer-slider slide-1">
                                @foreach ($featuredProducts->chunk(2) as $chunk)
                                <div>
                                    @foreach ($chunk as $product)
                                    <div class="media">
                                        <a href="{{ route('shop.product', ['slug' => $product->slug]) }}"><img class="img-fluid blur-up lazyload" src="{{ $product->cover_photo }}" alt=""></a>
                                        <div class="media-body align-self-center">
                                            {{-- <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div> --}}
                                            <a href="{{ route('shop.product', ['slug' => $product->slug]) }}">
                                                <h6>{{ $product->name }}</h6>
                                            </a>
                                            <h4>{{ $product->price_with_currency }}</h4>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- side-bar single product slider end -->
                        <!-- side-bar banner start here -->
                        {{-- <div class="collection-sidebar-banner">
                            <a href="#"><img src="{{ asset('images/side-banner.png') }}" class="img-fluid blur-up lazyload" alt=""></a>
                        </div> --}}
                        <!-- side-bar banner end here -->
                    </div>
                    
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    @if(request()->has('category'))
                                    <div class="top-banner-wrapper">
                                        <a href="#">
                                            <img src="{{ asset('assets/images/banner2.jpg') }}" class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <div class="top-banner-content small-section">
                                            <h4>{{ $category->name }}</h4>
                                            {{-- <p>{{ $category->description }}</p> --}}
                                        </div>
                                    </div>
                                    @endif
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="filter-main-btn">
                                                        <span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filter
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="product-filter-content">
                                                        <div class="search-count">
                                                            <h5>
                                                                {{ $products->links('vendor.pagination.custom-1') }}
                                                            </h5>
                                                        </div>
                                                        <div class="collection-view">
                                                            <ul>
                                                                <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="collection-grid-view">
                                                            <ul>
                                                                <li><img src="{{ asset('images/icon/2.png') }}" alt="" class="product-2-layout-view"></li>
                                                                <li><img src="{{ asset('images/icon/3.png') }}" alt="" class="product-3-layout-view"></li>
                                                                <li><img src="{{ asset('images/icon/4.png') }}" alt="" class="product-4-layout-view"></li>
                                                                <li><img src="{{ asset('images/icon/6.png') }}" alt="" class="product-6-layout-view"></li>
                                                            </ul>
                                                        </div>
                                                        {{-- <div class="product-page-per-view">
                                                            <select>
                                                                <option value="High to low">24 Products Par Page
                                                                </option>
                                                                <option value="Low to High">50 Products Par Page
                                                                </option>
                                                                <option value="Low to High">100 Products Par Page
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="product-page-filter">
                                                            <select>
                                                                <option value="High to low">Sorting items</option>
                                                                <option value="Low to High">50 Products</option>
                                                                <option value="Low to High">100 Products</option>
                                                            </select>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-wrapper-grid">
                                            <div class="row margin-res">
                                                @foreach ($products as $product)
                                                <div class="col-xl-3 col-6 col-grid-box">
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
                                                                <a title="Add to cart" href="{{ route('shop.add-to-cart', [$product->id]) }}"><i class="ti-shopping-cart" ></i></a>
                                                                {{-- <button data-toggle="modal" data-target="#addtocart" title="Add to cart"><i class="ti-shopping-cart"></i></button>  --}}
                                                                <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>
                                                                {{-- <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> --}}
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div>
                                                                {{-- <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div> --}}
                                                                <a href="{{ route('shop.product', ['slug' => $product->slug]) }}">
                                                                    <h6>{{ $product->name }}</h6>
                                                                </a>
                                                                <p>{{ $product->description }}</p>
                                                                <h4>{{ $product->price_with_currency }}</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="product-pagination">
                                            <div class="theme-paggination-block">
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        {{ $products->links('vendor.pagination.custom-2') }}
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <div class="product-search-count-bottom">
                                                            <h5> {{ $products->links('vendor.pagination.custom-1') }}</h5>
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
    </section>
    <!-- section End -->

@endsection