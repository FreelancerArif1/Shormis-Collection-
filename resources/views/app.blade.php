<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link rel="icon" type="image/x-icon" href="/favicon.ico"> --}}
        <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.ico">
        <link href='https://fonts.googleapis.com/css?family=Poppins:300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/font/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/js/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/js/owl-carousel/owl.theme.css">
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
        @inertiaHead
        <script src="{{ asset('assets') }}/js/jquery-1.9.1.min.js"></script>
        <script src="{{ asset('assets') }}/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ asset('assets') }}/js/less.min.js"></script>
        <script src="{{ asset('assets') }}/js/owl-carousel/owl.carousel.min.js"></script>
        <script src="{{ asset('assets') }}/js/sns-extend.js"></script>
        <script src="{{ asset('assets') }}/js/custom.js"></script>
    </head>
    <body  id="bd" class=" cms-index-index2 header-style2 cms-simen-home-page-v2 default cmspage">
        <div id="sns_wrapper">
        @inertia
        @env ('local')
            <script src="http://localhost:8080/js/bundle.js"></script>
        @endenv
        </div>
    </body>
</html>
