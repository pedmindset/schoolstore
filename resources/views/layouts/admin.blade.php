
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


    <!-- Content -->
    @yield('content')
    <!-- Content -->


    @include('partials.footer.footer')
    @include('partials.scripts')
</body>
</html>
