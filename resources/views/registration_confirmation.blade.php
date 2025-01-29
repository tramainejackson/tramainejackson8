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
                    <h1 class="h2 font8 text-white text-decoration-underline pt-2">Registration Received</h1>
                </div>

                @php $customer_count = $customer->toArray(); @endphp
                @if(count($customer_count) == 1)
                    )

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

                        <div class="col-12 text-center text-white font8 my-3">
                            <p class=""><span class="fw-bold text-decoration-underline">Cost & Includes</span>:&nbsp
                                <br/>Cost is $150 per person. There are limited spots on the bus.
                                Trip cost includes charter bus ride to and from all
                                universities and an overnight stay in a hotel in Virginia.
                                Please complete the registration form so that we can reserve your spot and send you
                                further
                                information.</p>
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

                    <!-- Contact Form -->
                    <div class="col-12">
                        <h1 class="text-white font1 display-3">Parent Registration Form</h1>
                    </div>

                    <div class="col-12">
                        <form method="POST" action="{{ route('contact_post') }}" class="font7 fw-bold">
                            @csrf

                            <div class="container-fluid border border-5 py-3 rounded-7">

                                <div class="row parent-input" id="parent_input_div">
                                    <div class="col-12">
                                        <p class="text-white px-5 py-2">
                                            Chaperone volunteers will potentially have to share a hotel room with a few
                                            children.
                                            You
                                            also
                                            will be required to provide a recent background check and child abuse
                                            clearance.
                                        </p>
                                    </div>

                                    <div class="col-12">
                                        <div class="md-form px-4 pt-2 mb-0">
                                            <input type="text" id="parent_first_name" name="parent_first_name"
                                                   class="form-control text-white"
                                                   value="{{ old('parent_first_name') ? old('parent_first_name') : '' }}"
                                                   placeholder="Enter First Name"
                                                   onclick="activateLabel(this)"
                                                   onblur="deactivateLabel(this)"
                                                   required/>
                                            <label for="parent_first_name" class="text-white"><span
                                                    class="border rounded-7 font-small p-1">01</span>&nbsp;
                                                Parent First Name?</label>
                                        </div>

                                        @if ($errors->has('parent_first_name'))
                                            <p class="red-text">{{ $errors->first('parent_first_name') }}</p>
                                        @endif

                                    </div>
                                    <div class="col-12">
                                        <div class="md-form px-4 pt-2 mb-0">
                                            <input type="text" id="parent_last_name" name="parent_last_name"
                                                   class="form-control text-white"
                                                   value="{{ old('parent_last_name') ? old('parent_last_name') : '' }}"
                                                   placeholder="Enter Last Name"
                                                   onclick="activateLabel(this)"
                                                   onblur="deactivateLabel(this)"
                                                   required/>
                                            <label for="parent_last_name" class="text-white"><span
                                                    class="border rounded-7 font-small p-1">02</span>&nbsp;
                                                Parent Last Name?</label>
                                        </div>

                                        @if ($errors->has('parent_last_name'))
                                            <p class="red-text">{{ $errors->first('parent_last_name') }}</p>
                                        @endif

                                    </div>

                                    <div class="col-12">
                                        <div class="md-form px-4 pt-2 mb-0">
                                            <input type="email" id="parent_email" name="parent_email"
                                                   class="form-control text-white"
                                                   value="{{ old('parent_email') ? old('parent_email') : '' }}"
                                                   placeholder="Enter Email Address"
                                                   required/>
                                            <label for="parent_email" class="active"><span
                                                    class="border rounded-7 font-small p-1">03</span>&nbsp;
                                                Parent Email Address</label>
                                        </div>

                                        @if ($errors->has('parent_email'))
                                            <p class="red-text">{{ $errors->first('parent_email') }}</p>
                                        @endif

                                    </div>

                                    <div class="col-12">
                                        <div class="md-form px-4 pt-2 mb-0">
                                            <input type="text" id="parent_phone" name="parent_phone"
                                                   class="form-control text-white"
                                                   value="{{ old('parent_phone') ? old('parent_phone') : '' }}"
                                                   placeholder="Enter Phone Number"/>
                                            <label for="parent_phone" class="active"><span
                                                    class="border rounded-7 font-small p-1">04</span>&nbsp;
                                                Parent Phone Number</label>
                                        </div>

                                        @if ($errors->has('parent_phone'))
                                            <p class="red-text">{{ $errors->first('parent_phone') }}</p>
                                        @endif

                                    </div>

                                    <div class="col-12 d-none">
                                        <div class="md-form px-4 pt-2 mb-0">
                                            <input type="text" id="confirmation_num" name="confirmation_num"
                                                   class="form-control text-white"
                                                   value="{{ $customer->confirmation }}"
                                                   placeholder="Enter Phone Number"/>
                                        </div>

                                    </div>

                                    <div class="col-12">
                                        <div class="md-form text-start mt-1">
                                            <div class="">
                                                <span class="border rounded-6 p-1 text-white"
                                                      style="font-size: 0.70rem;">05</span>&nbsp;
                                                <span class="font-small text-start text-white"
                                                      style="font-size: 0.75rem;">Are you planning on attending the tours?</span>
                                            </div>

                                            <div class="border-1 border-bottom mt-2 mx-4">
                                                <select type="text" id="parent_attending" name="parent_attending"
                                                        class="w-100"
                                                        data-mdb-select-init>
                                                    <option value="Y">Yes</option>
                                                    <option value="N" selected>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="md-form text-start mt-1">
                                            <div class="">
                                                <span class="border rounded-6 p-1 text-white"
                                                      style="font-size: 0.70rem;">06</span>&nbsp;
                                                <span class="font-small text-start text-white"
                                                      style="font-size: 0.75rem;">Volunteer To Be Chaperone?</span>
                                            </div>

                                            <div class="border-1 border-bottom mt-2 mx-4">
                                                <select type="text" id="chaperone" name="chaperone" class="w-100"
                                                        data-mdb-select-init>
                                                    <option value="Y">Yes</option>
                                                    <option value="N" selected>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 mt-4 text-left">
                                        <button class='btn btn-mdb-color border border-1 rounded-9 text-white'
                                                type='submit'>Send
                                            Registration Form <i
                                                class="fas fa-location-arrow"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-12 text-center text-white font8">
                        <p class="px-5 pt-2 mb-0">If you have any questions. Please feel free to email
                            us at <a href="mailto:hses04reunion@gmail.com">jackson.tramaine3@gmail.com</a></p> or
                        text/call at 267-879-4089
                    </div>
                    <!-- Contact Form -->

                    <!-- Scripts For Input Formatting -->
                    <script type="text/javascript" src="{{ asset('js/md-form.js') }}"></script>
                @else
                    @foreach($customer as $ini_customer)
                        <div class="col-12 col-md-6 text-center text-white font8 pb-4" id="">
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

                            @if($ini_customer->parent_attending != null && $ini_customer->parent_attending != '')
                                <p class="mb-1"><span class="fw-bold">Parent Attending</span>:&nbsp;<span
                                        class="">{{ $ini_customer->parent_attending == 'N' ? 'No' : 'Yes' }}</span></p>
                            @endif
                        </div>
                    @endforeach

                    <div class="col-12 text-center text-white font8" id="">
                        <p class="mb-1"><span class="fw-bold">Amount Received</span>:&nbsp;<span
                                class="mb-1">${{ $collective_paid_amount }}</span></p>

                        <p class="mb-1"><span class="fw-bold text-decoration-underline">Instructions</span>:&nbsp
                            <br/>Thanks you for registering for the HBCU Tour. This is a first come first serve event.
                            Once we receive payment, you will receive a confirmation number and your seat(s) will become
                            guaranteed!
                        </p>
                    </div>

                    <div class="col-12 text-center text-white font8 my-3">
                        <p class=""><span class="fw-bold text-decoration-underline">Cost & Includes</span>:&nbsp
                            <br/>Cost is $150 per person. There are limited spots on the bus.
                            Trip cost includes charter bus ride to and from all
                            universities and an overnight stay in a hotel in Virginia.
                            Please complete the registration form so that we can reserve your spot and send you further
                            information.</p>
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

                    <div class="col-12 text-center text-white font8">
                        <p class="px-5 pt-2 mb-0">If you have any questions. Please feel free to email
                            us at <a href="mailto:hses04reunion@gmail.com">jackson.tramaine3@gmail.com</a></p> or
                        text/call at 267-879-4089
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
