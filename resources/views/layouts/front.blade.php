<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
    	@yield('title')
    </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"><link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  


  <!-- CSS Files -->
  	<!--<link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet" /> -->
  	<link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
  	<link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <!-- Scripts -->
 <!--   <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!--<link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <style>
        a{
            text-decoration:none !important;
        }
    </style>
</head>
<body>
		@include('layouts.inc.frontnavbar')
            <div class="content">
                @yield('content')
            </div>

        <script src="{{ asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
        <script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>

        <script src="{{ asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('frontend/js/custom.js')}}"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @if(session('status')) 
        <script>
            swal("{{ session('status') }}");
        </script>
        @endif          



    @yield('scripts')
    
</body>
</html>
