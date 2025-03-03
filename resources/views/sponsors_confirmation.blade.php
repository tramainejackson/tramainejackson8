<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'HBCU College Tour'))</title>

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

<div id="individual-confirmation-page" class="container-fluid text-center" style="">

    <div class="row mx-md-5" style="background-color: rgba(10,10,10,0.8);">
        <!-- HBCU Tour -->
        <div class="bg-white h-100 position-absolute position-relative d-none d-md-inline-block"
             style="background-image: url('/images/logo_mesh.png'); background-position: center; background-size: contain; width: 10%; z-index: -1;">
        </div>

        <div class="bg-white h-100 position-absolute position-relative d-none d-md-inline-block"
             style="background-image: url('/images/logo_mesh.png'); background-position: center; background-size: contain; width: 10%; z-index: -1; right: 60px;">
        </div>

        <div class="col-11 mx-auto pt-4 pt-md-5 d-flex flex-column align-items-center justify-content-start">
            <div id="hbcu_tour" class="mw-100 mb-5 m-lg-5 px-lg-5">
                <img src="{{ asset('/images/hbcu_college_tour_banner.png') }}" class="img-fluid"
                     alt="Reunion Banner">
            </div>

        </div>

        {{--        <div class="mask position-relative" style="background-color: rgba(10,10,10,0.8);">--}}
        <div class="mask position-relative">
            <div class="row">

                <div class="col-12">
                    <h1 class="h2 font8 text-white text-decoration-underline pt-2">Sponsor Registration Received</h1>
                    <p class="text-white">Thank you for signing up to sponsor one or more of our students to attend the HBCU Tour.
                        Below is the information we received from you and some additional information.
                    </p>
                </div>

                <div class="col-12 text-center text-white font8" id="">
                    <p class="mb-1"><span class="fw-bold">Name</span>:&nbsp;<span
                            class="">{{ $sponsor->parent_first_name . ' ' . $sponsor->parent_last_name }}</span>
                    </p>

                    @if($sponsor->parent_email != null && $sponsor->parent_email != '')
                        <p class="mb-1"><span class="fw-bold">Email Address</span>:&nbsp;<span
                                class="">{{ $sponsor->parent_email }}</span></p>
                    @endif

                    @if($sponsor->parent_phone != null && $sponsor->parent_phone != '')
                        <p class="mb-1"><span class="fw-bold">Phone Number</span>:&nbsp;<span
                                class="">{{ $sponsor->parent_phone }}</span></p>
                    @endif

                    @if($sponsor->grade != null && $sponsor->grade != '')
                        <p class="mb-1"><span class="fw-bold">Phone Number</span>:&nbsp;<span
                                class="">{{ $sponsor->grade }}th</span></p>
                    @endif

                    <p class="mb-1"><span class="fw-bold">Amount Received</span>:&nbsp;<span
                            class="mb-1">${{ $sponsor->paid_amount }}</span></p>

                    <div class="col-12 text-center text-white font8 my-3">
                        <p class=""><span class="fw-bold text-decoration-underline">Cost & Includes</span>:&nbsp
                            <br/>Cost is $150 per person. There are limited spots on the bus.
                            Trip cost includes charter bus ride to and from all
                            universities and an overnight stay in a hotel in Virginia.
                        </p>
                    </div>

                    <div class="col-12 text-center text-white font8">
                        <p class=""><span class="fw-bold text-decoration-underline">Payments</span>:&nbsp
                            <br/>You can make a payment to any of the options below.</p>

                        <ul class="list-inline-item">
                            <li><b>CashApp:</b>&nbsp;$tramaine1986</li>
                            <li><b>Zelle:</b>&nbsp;2678794089</li>
                            <li><b>PayPal:</b>&nbsp;paypal.me/actionjack</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


{{--FOOTER--}}
<div class="" id="">
    @include('components.copyright')
</div>

<!-- Bootstrap core -->
<script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
<!-- Custom Scripts -->
<script type="text/javascript" src="{{ asset('js/myjs_functions.js') }}"></script>

</body>
</html>
