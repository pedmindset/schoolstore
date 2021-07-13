    <!-- loader start -->
    <div class="loader_skeleton">
        <header>
            <div class="top-header d-none d-sm-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="header-contact">
                                <ul>
                                    <li>Welcome to Student Shop</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us: 123 - 456 - 7890</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 text-right">
                            <ul class="header-dropdown">
                                <li class="mobile-wishlist"><a href="{{ url('shop/products') }}"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Shop</a>
                                </li>
                                <li class="onhover-dropdown mobile-account">
                                    <i class="fa fa-user" aria-hidden="true"></i> My Account
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main-menu">
                            <div class="menu-left">
                                <div class="navbar">
                                    <a href="javascript:void(0)">
                                        <div class="bar-style"><i class="fa fa-bars sidebar-bar" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="brand-logo">
                                    <a href="{{ route('shop.home') }}">
                                        <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid blur-up lazyload" alt="" style="width: 179px">
                                    </a>
                                </div>
                            </div>
                            <div class="menu-right pull-right">
                                <div>
                                    <nav>
                                        <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                        <ul class="sm pixelstrap sm-horizontal">
                                            <li>
                                                <div class="mobile-back text-right">Back<i
                                                        class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                                            </li>
                                            <li>
                                                <a href="#">Home</a>
                                            </li>
                                            <li>
                                                <a href="#">Product</a>
                                            </li>
                                            <li>
                                                <a href="#">Categories</a>
                                            </li>


                                        </ul>
                                    </nav>
                                </div>
                                <div>
                                    <div class="icon-nav d-none d-sm-block">
                                        <ul>
                                            <li class="onhover-div mobile-search">
                                                <div><img src="{{ asset('images/icon/search.png') }}" onclick="openSearch()"
                                                        class="img-fluid blur-up lazyload" alt=""> <i class="ti-search"
                                                        onclick="openSearch()"></i></div>
                                            </li>
                                            <li class="onhover-div mobile-setting">
                                                <div><img src="{{ asset('images/icon/setting.png') }}"
                                                        class="img-fluid blur-up lazyload" alt=""> <i
                                                        class="ti-settings"></i></div>
                                            </li>
                                            <li class="onhover-div mobile-cart">
                                                <div><img src="{{ asset('images/icon/cart.png') }}"
                                                        class="img-fluid blur-up lazyload" alt=""> <i
                                                        class="ti-shopping-cart"></i></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h2>product</h2>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <nav aria-label="breadcrumb" class="theme-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">product</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <section class="section-b-space ratio_asos">
            <div class="collection-wrapper product-page">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3 collection-filter">
                            <!-- side-bar colleps block stat -->
                            <div class="collection-filter-block">
                                <div class="filter-block">
                                    <h4 class="title-ldr"></h4>
                                    <ul>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="collection-filter-block">
                                <div class="theme-card">
                                    <div>
                                        <div class="product-box mt-0">
                                            <div class="media">
                                                <div class="img-wrapper"></div>
                                                <div class="media-body align-self-center">
                                                    <div class="product-detail">
                                                        <h4></h4>
                                                        <h6></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-box">
                                            <div class="media">
                                                <div class="img-wrapper"></div>
                                                <div class="media-body align-self-center">
                                                    <div class="product-detail">
                                                        <h4></h4>
                                                        <h6></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-box">
                                            <div class="media">
                                                <div class="img-wrapper"></div>
                                                <div class="media-body align-self-center">
                                                    <div class="product-detail">
                                                        <h4></h4>
                                                        <h6></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- silde-bar colleps block end here -->
                            <!-- side-bar single product slider start -->
                            <div class="theme-card">
                                <h5 class="title-border"></h5>
                                <div>
                                    <div class="product-box">
                                        <div class="media">
                                            <div class="img-wrapper"></div>
                                            <div class="media-body align-self-center">
                                                <div class="product-detail">
                                                    <h4></h4>
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-box">
                                        <div class="media">
                                            <div class="img-wrapper"></div>
                                            <div class="media-body align-self-center">
                                                <div class="product-detail">
                                                    <h4></h4>
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-box">
                                        <div class="media">
                                            <div class="img-wrapper"></div>
                                            <div class="media-body align-self-center">
                                                <div class="product-detail">
                                                    <h4></h4>
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- side-bar single product slider end -->
                        </div>
                        <div class="col-lg-9 col-sm-12 col-xs-12">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="main-product"></div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="sm-product"></div>
                                            </div>
                                            <div class="col-4">
                                                <div class="sm-product"></div>
                                            </div>
                                            <div class="col-4">
                                                <div class="sm-product"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="product-right">
                                            <h2></h2>
                                            <h4></h4>
                                            <h3></h3>
                                            <ul>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                            <div class="btn-group">
                                                <div class="btn-ldr"></div>
                                                <div class="btn-ldr"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <section class="tab-product m-0">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12">
                                        <ul>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                        <p></p>
                                        <p></p>
                                        <p></p>
                                        <p></p>
                                        <p></p>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- loader end -->
