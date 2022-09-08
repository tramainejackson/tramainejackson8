<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/mdb.min.css">
    <link rel="stylesheet" href="/css/style.css">

    @if(Auth::check() || (request()->getPathInfo() == '/login'))
        <style>
            .navbar.scrolling-navbar {
                background-color: #3f51b5!important;
            }

            .navbar.navbar-dark .navbar-nav .nav-item .nav-link {
                color: whitesmoke;
            }
        </style>
    @endif

    @yield('addt_styles')
</head>

<body class="" onload="myFunction()">

<script type="text/javascript">
    function myFunction() {
        // Check the dimensions of the device
        if(location.pathname.length <= 1) {
            // Check if this is the index page
            if(window.innerWidth <= window.innerHeight) {
                document.getElementById("indexVideo").src = 'videos/index_video2_vertical.mp4';
            }
        }
    }
</script>

<div id="app">

    {{-- Modal Spinner Content--}}
    @include('modals.loading_spinner')

    {{-- Redirected messages --}}
    @include('components.redirect_message')

    {{-- Navigation Content--}}
    @include('components.navigation')

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    {{-- Contact Form--}}
    @include('components.contact_form')

    <div class="switch_view text-center">
        <a class='btn btn-outline-unique' id="switch_view_btn" href='{{ route('portfolio1') }}' onload="cookieCheck()">See Company Recruiter Portfolio</a>
    </div>
</div>

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2020 Copyright:
    <span class=""> Tramaine Jackson Tech LLC</span>
</div>
<!-- Copyright -->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="/js/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="/js/mdb.min.js"></script>
<script type="text/javascript" src="/js/myjs.js"></script>

<script type="text/javascript">
    cookieCheck();
</script>

@if (session('status'))
    <script type="text/javascript">
        $('.alert').alert();
    </script>
@endif

@if(Auth::check() || (request()->getPathInfo() == '/login'))
    <script type="text/javascript">
        $('#companyRecruiterNav').remove();
    </script>
@endif

@yield('addt_scripts')

</body>
</html>
