<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('user.partials._css')
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('frontend/assets/img/favicon.png') }}">
    <!-- Title -->
    <title>Linka - Modern Blog & Magazine HTML Template</title>
</head>

<body>

    <!-- Start Navbar Area -->
    @include('user.partials._navbar')
    <!-- End Navbar Area -->
    @yield('content')

 
    @include('user.partials._footer')


    <!-- Start Go Top Area -->
    <div class="go-top">
        <i class='bx bx-chevrons-up'></i>
        <i class='bx bx-chevrons-up'></i>
    </div>
    <!-- End Go Top Area -->


   @include('user.partials._js')
   @yield('js')
</body>

</html>