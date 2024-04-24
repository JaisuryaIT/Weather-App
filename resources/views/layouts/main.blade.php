<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>@yield('title','Weather App | Get Your Weather')</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
    <link href="{{ asset('css/elegant_font/elegant_font.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons-master/css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/car_icons/css/car.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.switch.css') }}" rel="stylesheet">
    <link href="{{ asset('css/weather.css') }}" rel="stylesheet">
    <link href="{{ asset('css/date_time_picker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">
    @stack('internalCss')
</head>
<body>
    <div id="preloader">
        <div id="status">
            <div>
                <img src="{{ asset('img/logo_in.png') }}" width="70" height="60" alt="" data-retina="true">Loading...please wait!
            </div>
        </div>
    </div>
    @stack('bodycontent','')
    @include('layouts.includes.jquery')
    @stack('javascript')
</body>
</html>