<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'HBCU College Tour')</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Bakbak+One&family=Cinzel&family=Cinzel+Decorative:wght@100;200;300;400;500;600;700;800;900&family=Montserrat&family=Montserrat+Alternates:wght@100;200;300;400;500;600;700;800;900&family=Moon+Dance&family=Raleway&family=Roboto+Flex:opsz,wght@8..144,100;8..144,400;8..144,700&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/md-form.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/hbcu_style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom_styles.min.css') }}">

</head>

<body class="" style="background: url('/images/map_background.png') fixed center; background-size: contain;">

<div class="jumbotron-banner text-center">
    <div class="mx-auto container" style="background-color: rgba(10,10,10,0.8)">

        <div class="col-11 mx-auto pt-4 pt-md-5 d-flex flex-column align-items-center justify-content-start">

            <div id="hbcu_tour" class="mw-100 mb-5 m-lg-5 px-lg-5">
                <img src="{{ asset('/images/hbcu_college_tour_2026_banner.png') }}" class="img-fluid"
                     alt="Reunion Banner">
            </div>

        </div>

        <div class="text-light font1 mt-1" style="z-index: 1"
             data-mdb-animation-init
             data-mdb-toggle="animation"
             data-mdb-animation="fly-in-down"
             data-mdb-animation-start="onScroll"
             data-mdb-animation-duration=2000
             data-mdb-animation-show-on-load=false>
            <h1 class="px-5">Welcome to the registration for the HBCU College Tour.</h1>

{{--            <h4 class="px-5">We're sorry but we have currently reached the maximum number of guest for this upcoming--}}
{{--                tour. If you have already registered, we have your email address on file and you will be notified first--}}
{{--                for any upcoming tours.</h4>--}}

            <!-- ITINERARY -->
            {{--            <div class="row mt-4">--}}
            {{--                <div class="col-12">--}}
            {{--                    <h2 class="px-5 text-decoration-underline">ITINERARY</h2>--}}
            {{--                </div>--}}

            {{--                <div class="col-12 col-md-6">--}}
            {{--                    <h4 class="text-decoration-underline">April 3rd</h4>--}}

            {{--                    <ul class="list-inline-item">--}}
            {{--                        <li class="">Visit Morgan State</li>--}}
            {{--                        <li class="">Visit Coppin State</li>--}}
            {{--                        <li class="">Visit Howard University</li>--}}
            {{--                        <li class="">Travel To Virginia</li>--}}
            {{--                    </ul>--}}
            {{--                </div>--}}
            {{--                <div class="col-12 col-md-6">--}}
            {{--                    <h4 class="text-decoration-underline">April 4th</h4>--}}

            {{--                    <ul class="list-inline-item">--}}
            {{--                        <li class="">Visit Hampton University</li>--}}
            {{--                        <li class="">Return Home</li>--}}
            {{--                    </ul>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            <div class="row">--}}
            {{--                <div class="col-12">--}}
            {{--                    <p class="">Cost is $150 per person. There are limited spots on the bus.--}}
            {{--                        Trip cost includes charter bus ride to and from all--}}
            {{--                        universities and an overnight stay in a hotel in Virginia.--}}
            {{--                        Please complete the registration form so that we can reserve your spot and send you further information.</p>--}}
            {{--                </div>--}}

            <div class="col-12">
                <p class="px-5 pt-2 mb-0">If anyone has any questions. Please feel free to email us at
                    <a href="mailto:hbcucollegetour215@gmail.com">hbcucollegetour215@gmail.com</a></p>

            </div>
            {{--            </div>--}}
        </div>
    </div>

        @include('components.hbcu_tour_registration')

    <div
        class="alert fade"
        id="return-data-alert"
        role="alert"
        data-mdb-color="success"
        data-mdb-position="top-right"
        data-mdb-stacking="true"
        data-mdb-width="300px"
        data-mdb-append-to-body="true"
        data-mdb-hidden="true"
        data-mdb-autohide="true"
        data-mdb-delay="4000">
        <p class="alertBody m-0 p-0 text-center"></p>
    </div>

    <div
        class="alert fade"
        id="return-data-alert-bad"
        role="alert"
        data-mdb-color="danger"
        data-mdb-position="top-right"
        data-mdb-stacking="true"
        data-mdb-width="300px"
        data-mdb-append-to-body="true"
        data-mdb-hidden="true"
        data-mdb-autohide="true"
        data-mdb-delay="4000">
        <p class="alertBody m-0 p-0 text-center"></p>
    </div>
</div>

{{--FOOTER--}}
<div class="" id="">
    @include('components.copyright')
</div>

<!-- Bootstrap core -->
<script type="module" src="{{ asset('js/mdb.es.min.js') }}"></script>
<!-- Custom Scripts -->
<script type="module" src="{{ asset('js/myjs_modules.js') }}"></script>
<script type="module" src="{{ asset('js/myjs_functions.js') }}"></script>

@if(session('status'))
    <script type="module">
        import {Alert} from "{{ asset('/js/mdb.es.min.js') }}";

        document.getElementsByClassName('alertBody')[0].innerHTML = '{{ session('status') }}';
        new Alert(document.getElementById('return-data-alert')).show();
    </script>
@elseif(session('bad_status'))
    <script type="module">
        import {Alert} from "{{ asset('/js/mdb.es.min.js') }}";

        document.getElementsByClassName('alertBody')[1].innerHTML = '{{ session('bad_status') }}';
        new Alert(document.getElementById('return-data-alert-bad')).show();
    </script>
@endif

</body>
</html>
