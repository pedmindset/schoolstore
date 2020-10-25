<div class="menu-right pull-right">
    <div>
        <nav id="main-nav">
            <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
            <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                <li>
                    <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2"
                            aria-hidden="true"></i></div>
                </li>
                <li>
                    <a href="{{ route('shop.home') }}">Home</a>
                </li>
                <li>
                    <a href="../shop/shop">Products</a>
                </li>
                <li>
                    <a href="{{ route('shop.categories') }}">Categories</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- settings -->
    @include('partials.header.settings')
    <!-- settings -->

</div>
