<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{$data['setting']->name}}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/frontend/images/favicon.ico')}}" />
    <link href="{{asset('assets/frontend/css/vendor/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/css/vendor/vendor.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/css/style-sport.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/fonts/icomoon/icons.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;display=swap" rel="stylesheet">
    @yield('css')
</head>
<body class="has-smround-btns has-loader-bg equal-height">
@include('frontend.includes.header')
@yield('main-content')
@include('frontend.includes.footer')

<script src="{{asset('assets/frontend/js/vendor-special/lazysizes.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/vendor-special/ls.bgset.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/vendor-special/ls.aspectratio.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/vendor-special/jquery.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/vendor-special/jquery.ez-plus.js')}}"></script>
<script src="{{asset('assets/frontend/js/vendor-special/instafeed.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/vendor/vendor.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/app-html.js')}}"></script>
</body>
</html>
