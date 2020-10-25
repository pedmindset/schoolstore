<div class="menu-left">
    <div class="navbar">
        <a href="javascript:void(0)" onclick="openNav()">
            <div class="bar-style"><i class="fa fa-bars sidebar-bar" aria-hidden="true"></i>
            </div>
        </a>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="sidebar-overlay" onclick="closeNav()"></a>
            <nav>
                <div onclick="closeNav()">
                    <div class="sidebar-back text-left"><i class="fa fa-angle-left pr-2"
                            aria-hidden="true"></i> Back</div>
                </div>
                <ul id="sub-menu" class="sm pixelstrap sm-vertical">
                    <h4 class="p-4">Categories</h4>
                    @foreach ($productCategories as $category)
                    <li> <a href="#">{{ $category->name }}</a></li>
                    @endforeach
                    
                </ul>
            </nav>
        </div>
    </div>
    <div class="brand-logo">
        <a href="index.html"><img src="{{ asset('images/icon/logo.png') }}"
                class="img-fluid blur-up lazyload" alt=""></a>
    </div>
</div>
