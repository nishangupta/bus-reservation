<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name')?? 'Admin | Bus reservation' }}</title>

    {{-- <link rel="shortcut icon" type="image/png" href="{{asset('images/logo/joblister.png')}}" /> --}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">    
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    @stack('css')
    
</head>
<body class="bg-gradient-primary">
    
    @yield('content')
    @include('sweetalert::alert')
    
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>

    @stack('js')
</body>
</html>
