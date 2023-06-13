<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Laravel Role Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('partials.backend.styles')
    <style>
        .page-title-area:before{
            background:rgb(240, 240, 240) !important;
        }
    </style>
    @yield('styles')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">

       @include('partials.backend.sidebar')

        <!-- main content area start -->
        <div class="main-content">
            @include('partials.backend.header')
            @yield('admin-content')
        </div>
        <!-- main content area end -->
        @include('partials.chat')
        @include('partials.backend.footer')
    </div>
    <!-- page container area end -->

    @include('partials.backend.offsets')
    @include('partials.backend.scripts')
    @yield('scripts')
</body>

</html>
