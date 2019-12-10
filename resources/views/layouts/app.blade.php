<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">

    <head>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href="{!! asset('/storage/images/logo.png') !!}">
        <!-- Author Meta -->
        <meta name="Ivan Demirovic" content="Song Book">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Site Title -->
        <title>{{ config('app.name', 'Vino I Gitara') }}</title>

        <!-- Google Font ============================================= -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500i" rel="stylesheet">

        <!-- CSS ============================================= -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">

        <link rel="stylesheet" href="{!! asset('css/linearicons.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/font-awesome.min.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/bootstrap.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/magnific-popup.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/nice-select.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/animate.min.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/owl.carousel.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/main.css') !!}">

    </head>

    <body>

        @include('sweetalert::alert')

        <!-- Start Header Area -->
        @include('include.header')
        <!-- End Header Area -->

        @yield('content')

        <!-- Start Footer Area -->
        @include('include.footer')
        <!-- End Footer Area -->

        <!-- ####################### Start Scroll to Top Area ####################### -->
        <div id="back-top">
            <a title="Go to Top" href="#"></a>
        </div>
        <!-- ####################### End Scroll to Top Area ####################### -->

        <script src="{!! asset('js/vendor/jquery-2.2.4.min.js') !!}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <script src="{!! asset('js/vendor/bootstrap.min.js') !!}"></script>
        <script src="{!! asset('js/easing.min.js') !!}"></script>
        <script src="{!! asset('js/hoverIntent.js') !!}"></script>
        <script src="{!! asset('js/superfish.min.js') !!}"></script>
        <script src="{!! asset('js/jquery.ajaxchimp.min.js') !!}"></script>
        <script src="{!! asset('js/jquery.magnific-popup.min.js') !!}"></script>
        <script src="{!! asset('js/owl.carousel.min.js') !!}"></script>
        <script src="{!! asset('js/owl-carousel-thumb.min.js') !!}"></script>
        <script src="{!! asset('js/jquery.sticky.js') !!}"></script>
        <script src="{!! asset('js/jquery.nice-select.min.js') !!}"></script>
        <script src="{!! asset('js/parallax.min.js') !!}"></script>
        <script src="{!! asset('js/waypoints.min.js') !!}"></script>
        <script src="{!! asset('js/wow.min.js') !!}"></script>
        <script src="{!! asset('js/jquery.counterup.min.js') !!}"></script>
        <script src="{!! asset('js/mail-script.js') !!}"></script>
        <script src="{!! asset('js/main.js') !!}"></script>
    </body>

</html>
