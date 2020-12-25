<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('extra-top')

    <!-- Styles -->
    @livewireStyles
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/overwrite.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tail.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Wrapper -->
	<div id="wrapper">

        <div id="main">
            <div class="inner">
                <!-- Header -->
                @include('layouts.header')
                <!--// Header -->
                    
                @yield('content')
            </div>
        </div>

        <!-- Sidebar -->
        @include('layouts.menu')
        <!--// Sidebar -->

    </div>
    <!--// Wrapper -->



    @yield('extra-bottom')
    <!-- Scripts -->
    @livewireScripts
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/browser.min.js') }}"></script>
    <script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/util.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
