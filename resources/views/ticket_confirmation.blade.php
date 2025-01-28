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
    <link rel="stylesheet" href="{{ asset('css/hbcu_style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom_styles.min.css') }}">

</head>

<body class="" style="background: url('/images/map_background.png') fixed center; background-size: contain;">

<div id="individual-confirmation-page" class="container-fluid text-center" style="">

    <div class="row mx-md-5" style="background-color: rgba(10,10,10,0.8);">
        <!-- HBCU Tour -->
        <div class="bg-white h-100 position-absolute position-relative"
             style="background-image: url('/images/confirmed.png'); background-position: center; background-size: contain; width: 15%; z-index: -1;">
        </div>
        <div class="bg-white h-100 position-absolute position-relative"
             style="background-image: url('/images/logo_mesh.png'); background-position: center; background-size: contain; width: 15%; z-index: -1; right: 60px;">
        </div>

        <div class="col-11 mx-auto pt-4 pt-md-5 d-flex flex-column align-items-center justify-content-start">

            <div id="hbcu_tour" class="mw-100 mb-5" style="margin: 0rem 10rem;">
                <img src="{{ asset('/images/hbcu_college_tour_banner.png') }}" class="img-fluid"
                     alt="Reunion Banner">
            </div>

        </div>

        <div class="mask position-relative" style="background-color: rgba(10,10,10,0.8);">
            <div class="row">

                <div class="col-12">
                    <h1 class="h2 font8 text-white text-decoration-underline pt-2">Confirmation</h1>
                </div>

                @php $customer_count = $customer->toArray(); @endphp
                @if(count($customer_count) == 1))

                    @php $customer = $customer->first(); @endphp

                    <div class="col-12 text-center text-white font8" id="">
                        <p class="mb-1"><span class="fw-bold">Name</span>:&nbsp;<span
                                class="">{{ $customer->first_name . ' ' . $customer->last_name }}</span>
                        </p>

                        @if($customer->email != null && $customer->email != '')
                            <p class="mb-1"><span class="fw-bold">Email Address</span>:&nbsp;<span
                                    class="">{{ $customer->email }}</span></p>
                        @endif

                        @if($customer->phone != null && $customer->phone != '')
                            <p class="mb-1"><span class="fw-bold">Phone Number</span>:&nbsp;<span
                                    class="">{{ $customer->phone }}</span></p>
                        @endif

                        <p class="mb-1"><span class="fw-bold">Amount Received</span>:&nbsp;<span
                                class="mb-1">${{ $customer->paid_amount }}</span></p>

                        <p class="mb-1"><span class="fw-bold text-decoration-underline">Instructions</span>:&nbsp;<span
                                class=""><br/><b>April 3, 2025:</b> Depart at 7AM from the Target Shopping Center at 4000 Monument Rd, Philadelphia, PA 19131. <br/> 9AM arrive at Morgan State University for 1 hour tour and depart at 10AM <br/> 11AM arrive at Coppin State for 1 hour tour and depart at 12PM <br/> 1PM arrive at Howard University for 3 hour tour and depart at 4PM for an overnight stay at the Holiday Inn Express in Hampton Virginia <br/><br/><b>April 4, 2025:</b> Depart from Holiday Inn Express at 7AM.<br/> 8AM arrive at Hampton University for 6 hour tour and depart at 4PM to return to Philadelphia</span>
                        </p>
                    </div>
                @else
                    @foreach($customer as $ini_customer)
                        <div class="col-6 text-center text-white font8" id="">
                            @if($ini_customer->first_name != null && $ini_customer->first_name != '')
                                <p class="mb-1"><span class="fw-bold">Name</span>:&nbsp;<span
                                        class="">{{ $ini_customer->first_name . ' ' . $ini_customer->last_name }}</span>
                                </p>
                            @endif

                            @if($ini_customer->parent_first_name != null && $ini_customer->parent_first_name != '')
                                <p class="mb-1"><span class="fw-bold">Name</span>:&nbsp;<span
                                        class="">{{ $ini_customer->parent_first_name . ' ' . $ini_customer->parent_last_name }}</span>
                                </p>
                            @endif

                            @if($ini_customer->email != null && $ini_customer->email != '')
                                <p class="mb-1"><span class="fw-bold">Email Address</span>:&nbsp;<span
                                        class="">{{ $ini_customer->email }}</span></p>
                            @endif

                            @if($ini_customer->parent_email != null && $ini_customer->parent_email != '')
                                <p class="mb-1"><span class="fw-bold">Email Address</span>:&nbsp;<span
                                        class="">{{ $ini_customer->parent_email }}</span></p>
                            @endif

                            @if($ini_customer->phone != null && $ini_customer->phone != '')
                                <p class="mb-1"><span class="fw-bold">Phone Number</span>:&nbsp;<span
                                        class="">{{ $ini_customer->phone }}</span></p>
                            @endif

                            @if($ini_customer->parent_phone != null && $ini_customer->parent_phone != '')
                                <p class="mb-1"><span class="fw-bold">Phone Number</span>:&nbsp;<span
                                        class="">{{ $ini_customer->parent_phone }}</span></p>
                            @endif
                        </div>
                    @endforeach

                    <div class="col-12 text-center text-white font8" id="">
                        <p class="mb-1"><span class="fw-bold">Amount Received</span>:&nbsp;<span
                                class="mb-1">${{ $collective_paid_amount }}</span></p>

                        <p class="mb-1"><span class="fw-bold text-decoration-underline">Instructions</span>:&nbsp;<span
                                class=""><br/><b>April 3, 2025:</b> Depart at 7AM from the Target Shopping Center at 4000 Monument Rd, Philadelphia, PA 19131. <br/> 9AM arrive at Morgan State University for 1 hour tour and depart at 10AM <br/> 11AM arrive at Coppin State for 1 hour tour and depart at 12PM <br/> 1PM arrive at Howard University for 3 hour tour and depart at 4PM for an overnight stay at the Holiday Inn Express in Hampton Virginia <br/><br/><b>April 4, 2025:</b> Depart from Holiday Inn Express at 7AM.<br/> 8AM arrive at Hampton University for 6 hour tour and depart at 4PM to return to Philadelphia</span>
                        </p>
                    </div>
                @endif
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
