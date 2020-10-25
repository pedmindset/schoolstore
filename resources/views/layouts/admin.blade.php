
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SchoolShop">
    <meta name="keywords" content="SchoolShop">
    <meta name="author" content="SchoolShop">
    <link rel="icon" href="{{ asset('images/favicon/1.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/favicon/1.png') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    @include('partials.styles')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <title>@yield('title') | {{ config('app.name', 'Shop') }}</title>
</head>
<body>
    <!-- loader start -->
    @yield('loader')
    <!-- loader end -->

    <!-- header start -->
    @include('partials.header.header')
    <!-- header end -->

    <!-- Home slider -->
    @yield('slider')
    <!-- Home slider end -->

     <!-- breadcrumb start -->
     <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>@yield('title')</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!-- Content -->
    @yield('content')
    <!-- Content -->


    @include('partials.footer.footer')
    @include('partials.scripts')
</body>
</html>
