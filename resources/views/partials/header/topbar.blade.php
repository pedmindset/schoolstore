<div class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="header-contact">
                    <ul>
                        <li>Welcome to Our store School Shop</li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us: 123 - 456 - 7890</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 text-right">
                <ul class="header-dropdown">
                    <li class="mobile-wishlist"><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                    </li>
                    @auth


                    <li class="onhover-dropdown mobile-account"> <i class="fa fa-user" aria-hidden="true"></i>
                        {{ auth()->user()->name }}
                        <ul class="onhover-show-div">
                            <li><a href="{{ route('customer.dashboard') }}">Dashbaord</a></li>
                            <li><a href="{{ url('shop/dashboard#profile') }}">Profile</a></li>
                            <li><a href="{{ url('shop/dashboard#orders') }}">Orders</a></li>
                            <li><a href="{{ url('shop/dashboard#verification') }}">Verifications</a></li>
                            <li><a href="{{ url('shop/dashboard#guarantors') }}">Guarantors</a></li>
                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        </ul>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @endauth
                    @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</div>
