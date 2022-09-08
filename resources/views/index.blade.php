<x-app-layout>

    @section('addt_styles')
        <style>
            header, section {
                background-color: black;
            }

            nav, #contact {
                display: none !important;
            }

            .footer-copyright {
                position: fixed;
                bottom: 0px;
                width: 100%;
            }

            .top-nav-collapse {
                background-color: #7d8488 !important;
            }

            .navbar:not(.top-nav-collapse) {
                background: transparent !important;
            }

            @media (max-width: 768px) {
                .navbar:not(.top-nav-collapse) {
                    background: #7d8488 !important;
                }
            }

            .hm-gradient .full-bg-img {
                background: -moz-linear-gradient(45deg, rgba(242, 34, 50, 0.5), rgba(255, 187, 54, 0.6) 100%);
                background: -webkit-linear-gradient(45deg, rgba(242, 34, 50, 0.5), rgba(255, 187, 54, 0.6) 100%);
                background: linear-gradient(to 45deg, rgba(29, 236, 197, 0.4), rgba(96, 0, 136, 0.4) 100%);
            }

            .switch_view {
                display: none;
            }
        </style>
    @endsection


    <div class="full-height">

        <!--Main Navigation-->
        <header>
            <!--Intro Section-->
            <section class="view intro-video">

                <video class="mw-100 h-auto" id="indexVideo" src="{{ asset('videos/index_video2.mp4') }}"
                       type="video/mp4" poster="" playsinline autoplay muted loop>
                </video>

                <div class="mask d-flex justify-content-center align-items-center">
                    <!-- Content -->
                    <div class="container px-md-3 px-sm-0">
                        <!--Grid row-->
                        <div class="row wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                            <!--Grid column-->
                            <div class="col-md-12 mb-4 white-text text-center wow fadeIn"
                                 style="visibility: visible; animation-name: fadeIn;">
                                <h3 class="display-3 font-weight-bold white-text mb-0 pt-md-5 pt-5">The Creative
                                    Mind</h3>
                                <h5 class="font-weight-light font-italic white-text">of Tramaine Jackson</h5>

                                <hr class="hr-light my-4 w-75">

                                <a href="{{ route('portfolio1') }}"
                                   class="btn btn-rounded btn-outline-primary waves-effect waves-light w-75 my-2"
                                   data-toggle="tooltip" data-placement="top"
                                   title="Company looking for a web developer to add to their staff">
                                    <i class="fas fa-users"></i> &nbsp;Company Recruiter
                                </a>
                                <a href="{{ route('portfolio2') }}"
                                   class="btn btn-rounded btn-outline-info waves-effect waves-light w-75 my-2"
                                   data-toggle="tooltip" data-placement="bottom"
                                   title="Business needing a website created">
                                    <i class="fas fa-male"></i> &nbsp;Small Business
                                </a>
                            </div>
                            <!--Grid column-->
                        </div>
                        <!--Grid row-->
                    </div>
                    <!-- Content -->
                </div>
            </section>

        </header>
        <!--Main Navigation-->

    </div>
</x-app-layout>
