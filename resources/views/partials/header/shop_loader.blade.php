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
                                            <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                                        </li>
                                        <li>
                                            <a href="#">Home</a>
                                        </li>

                                        <li>
                                            <a href="#">Products</a>
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
                                            <div><img src="{{ asset('images/icon/search.png') }}" onclick="openSearch()" class="img-fluid blur-up lazyload" alt=""> <i class="ti-search" onclick="openSearch()"></i></div>
                                        </li>
                                        <li class="onhover-div mobile-setting">
                                            <div><img src="{{ asset('images/icon/setting.png') }}" class="img-fluid blur-up lazyload" alt=""> <i class="ti-settings"></i></div>
                                        </li>
                                        <li class="onhover-div mobile-cart">
                                            <div><img src="{{ asset('images/icon/cart.png') }}" class="img-fluid blur-up lazyload" alt=""> <i class="ti-shopping-cart"></i></div>
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
                        <h2>Products</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
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
                            <div class="filter-block">
                                <h4 class="title-ldr"></h4>
                                <ul>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
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
                        <!-- side-bar banner start here -->
                        <div class="collection-sidebar-banner"></div>
                        <!-- side-bar banner end here -->
                    </div>
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="top-banner-wrapper">
                                        <div class="img-ldr-top"></div>
                                        <div class="top-banner-content small-section">
                                            <h4></h4>
                                            <h5></h5>
                                            <p></p>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="row m-0 w-100">
                                                <div class="col-xl-4">
                                                    <div class="filter-panel">
                                                        <h6 class="ldr-text"></h6>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-6">
                                                    <div class="filter-panel">
                                                        <h6 class="ldr-text"></h6>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2 col-lg-4 col-6">
                                                    <div class="filter-panel">
                                                        <h6 class="ldr-text"></h6>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2 col-lg-4 d-none d-lg-block">
                                                    <div class="filter-panel">
                                                        <h6 class="ldr-text"></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-wrapper-grid">
                                            <div class="row">
                                                <div class="col-xl-3 col-md-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper"></div>
                                                        <div class="product-detail">
                                                            <h4></h4>
                                                            <h5></h5>
                                                            <h6></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper"></div>
                                                        <div class="product-detail">
                                                            <h4></h4>
                                                            <h5></h5>
                                                            <h6></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper"></div>
                                                        <div class="product-detail">
                                                            <h4></h4>
                                                            <h5></h5>
                                                            <h6></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper"></div>
                                                        <div class="product-detail">
                                                            <h4></h4>
                                                            <h5></h5>
                                                            <h6></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper"></div>
                                                        <div class="product-detail">
                                                            <h4></h4>
                                                            <h5></h5>
                                                            <h6></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper"></div>
                                                        <div class="product-detail">
                                                            <h4></h4>
                                                            <h5></h5>
                                                            <h6></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper"></div>
                                                        <div class="product-detail">
                                                            <h4></h4>
                                                            <h5></h5>
                                                            <h6></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper"></div>
                                                        <div class="product-detail">
                                                            <h4></h4>
                                                            <h5></h5>
                                                            <h6></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper"></div>
                                                        <div class="product-detail">
                                                            <h4></h4>
                                                            <h5></h5>
                                                            <h6></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper"></div>
                                                        <div class="product-detail">
                                                            <h4></h4>
                                                            <h5></h5>
                                                            <h6></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper"></div>
                                                        <div class="product-detail">
                                                            <h4></h4>
                                                            <h5></h5>
                                                            <h6></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper"></div>
                                                        <div class="product-detail">
                                                            <h4></h4>
                                                            <h5></h5>
                                                            <h6></h6>
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
</div>
<!-- loader end -->
