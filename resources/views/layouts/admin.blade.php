
<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <title>@yield('title') {{ config('app.name', 'Field Service') }}</title>
</head>
<body>
<div class="h-screen flex overflow-hidden bg-gray-100" x-data="{ sidebarOpen: false }" @keydown.window.escape="sidebarOpen = false">
  <!-- Off-canvas menu for mobile -->
  
  @include('partials.sidebar')
  <!-- replace your content here -->
  <div class="py-4">
    @yield('content')
</div>
 <!-- end replace -->
  @include('partials.content')

</div>


</body>
</html>