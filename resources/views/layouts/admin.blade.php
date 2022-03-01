<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"><link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  


  <!-- CSS Files -->
  <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet" />
        <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" />


    <!-- Scripts -->
 <!--   <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!--<link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
    <div class="wrapper">
        @include('layouts.inc.sidebar')

    <div class="main-panel">
            @include('layouts.inc.adminnavbar')
       

            <div class="content">
                @yield('content')
            </div>
            <div class="container-fluid">
                @include('layouts.inc.adminfooter')
            </div>
        </div>
    </div>


        <script src="{{ asset('admin/js/jquery.min.js')}}"></script>
        <script src="{{ asset('admin/js/popper.min.js')}}"></script>
        <script src="{{ asset('admin/js/bootstrap-material-design.min.js')}}"></script>
        <script src="{{ asset('admin/js/perfect-scrollbar.jquery.min.js')}}"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        @if(session('status')) 
        <script>
            swal("{{ session('status') }}");
        </script>
        @endif          



    @yield('scripts')
    
</body>
</html>
