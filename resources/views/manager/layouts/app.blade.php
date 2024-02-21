<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>

        <meta charset="utf-8">
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Tailwind Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

        <link rel="stylesheet" href="{{asset('assets/libs/swiper/swiper-bundle.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/tailwind2.css')}}">
    </head>

    <body data-mode="light" data-sidebar-size="lg" class="group">

        <!-- ========== Left Sidebar Start ========== -->
        @include('manager.components.sidebar')
        <!-- Left Sidebar End -->

        @include('manager.components.navbar')

        <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
            <div class="page-content dark:bg-zinc-700">
                <div class="container-fluid px-[0.625rem]">


                    @yield('content')


                </div>
            </div>
        </div>

        <script src="{{asset('assets/libs/@popperjs/core/umd/popper.min.js')}}"></script>
        <script src="{{asset('assets/libs/feather-icons/feather.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenujs/metismenujs.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- apexcharts -->
        <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
        <!-- Plugins js-->
        <script src="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>

        <script src="{{asset('assets/libs/swiper/swiper-bundle.min.js')}}"></script>

        <!-- dashboard init -->
        <script  src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

        <script src="{{asset('assets/js/pages/nav&tabs.js')}}"></script>

        <script src="{{asset('assets/js/pages/login.init.js')}}"></script>

        <script  src="{{asset('assets/js/app.js')}}"></script>

    </body>

</html>
