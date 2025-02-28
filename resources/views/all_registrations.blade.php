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

        <div class="mask position-relative">
            <div class="row">

                <div class="col-12">
                    <h1 class="h2 font8 text-white text-decoration-underline pt-2">Registration Received</h1>
                </div>

                <div class="col-12">
                    <div data-mdb-datatable-init class="datatable" data-mdb-striped=true>
                        <table id="exampleTable" class="table table-responsive table-info">
                            <thead>
                            <tr>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">School</th>
                                <th class="th-sm">Grade</th>
                                <th class="th-sm">Adult</th>
                                <th class="th-sm">Parent Attending</th>
                                <th class="th-sm">Chaperone</th>
                                <th class="th-sm">Paid In Full</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($registrations as $ini_customer)
                                <tr>
                                    @if($ini_customer->first_name != null && $ini_customer->first_name != '')
                                        <td class="mb-1 text-center font8"><span
                                                class="">{{ $ini_customer->first_name . ' ' . $ini_customer->last_name }}</span>
                                        </td>
                                    @endif

                                    @if($ini_customer->parent_first_name != null && $ini_customer->parent_first_name != '')
                                        <td class="mb-1 text-center font8"><span
                                                class="">{{ $ini_customer->parent_first_name . ' ' . $ini_customer->parent_last_name }}</span>
                                        </td>
                                    @endif

                                    @if($ini_customer->school != null && $ini_customer->school != '')
                                        <td class="mb-1 text-center font8"><span
                                                class="">{{ $ini_customer->school }}</span>
                                        </td>
                                    @else
                                        <td class="mb-1 text-center font8"><span class="">N/A</span></td>
                                    @endif

                                    @if($ini_customer->grade != null && $ini_customer->grade != '')
                                        <td class="mb-1 text-center font8"><span
                                                class="">{{ $ini_customer->grade }}th</span></td>
                                    @else
                                        <td class="mb-1 text-center font8"><span class="">N/A</span></td>
                                    @endif

                                    @if($ini_customer->parent_first_name != null && $ini_customer->parent_first_name != '')
                                        <td class="mb-1 text-center font8"><span class="">Yes</span></td>
                                    @else
                                        <td class="mb-1 text-center font8"><span class="">No</span></td>
                                    @endif

                                    @if($ini_customer->parent_attending != null && $ini_customer->parent_attending != '')
                                        <td class="mb-1 text-center font8"><span
                                                class="">{{ $ini_customer->parent_attending == 'N' ? 'No' : 'Yes' }}</span>
                                        </td>
                                    @else
                                        <td class="mb-1 text-center font8"><span class="">No</span></td>
                                    @endif

                                    @if($ini_customer->chaperone != null && $ini_customer->chaperone != '')
                                        <td class="mb-1 text-center font8"><span
                                                class="">{{ $ini_customer->chaperone == 'N' ? 'No' : 'Yes' }}</span>
                                        </td>
                                    @else
                                        <td class="mb-1 text-center font8"><span class="">No</span></td>
                                    @endif

                                    @if($ini_customer->paid_in_full != null && $ini_customer->paid_in_full != '')
                                        <td class="mb-1 text-center font8"><span
                                                class="">{{ $ini_customer->paid_in_full == 'N' ? 'No' : 'Yes' }}</span>
                                        </td>
                                    @else
                                        <td class="mb-1 text-center font8"><span class="">No</span></td>
                                    @endif
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{--FOOTER--}}
<div class="alert fade" id="show-example" data-mdb-hidden="true" role="alert" data-mdb-alert-init data-mdb-color="primary">
    Hidden alert!
</div>
<div class="" id="footer1">
    @include('components.copyright')
</div>

<!-- Bootstrap core -->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<!-- Custom Scripts -->
<script type="module" src="{{ asset('js/myjs_modules.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/myjs_functions.js') }}"></script>

<script type="module">
    import { Alert } from "{{ asset('/js/mdb.es.min.js') }}";

    // Alert.getInstance(document.getElementById('show-example')).show();
</script>

</body>
</html>
