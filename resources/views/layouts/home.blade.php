<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name')?? 'Bus reservation' }}</title>

    {{-- <link rel="shortcut icon" type="image/png" href="{{asset('images/logo/joblister.png')}}" /> --}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">    
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
    @stack('css')
    
</head>
<body>
    <div id="app">
        <div id="wrapper">
            @include('inc.admin.sidebar')

             <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    @include('inc.admin.topbar')

                    @yield('content')

                    @include('inc.admin.footer')
                </div>
            </div>
        </div>
      
        @include('inc.admin.scroll-top')
        @include('inc.admin.logout-modal')
    </div>
    
    @include('sweetalert::alert')
    
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>
    {{-- needs to be imported here --}}
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $("#dataTable").DataTable();
        });
    </script>
    @stack('js')
</body>
</html>
