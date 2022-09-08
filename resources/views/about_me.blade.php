<x-app-layout>

    @section('addt_scripts')
        <script type="text/javascript">
            $('#companyRecruiterNav').remove();
        </script>
    @endsection

    @section('addt_styles')
        <style>
            .avatar {
                transform: translatey(0px);
                animation: float 6s ease-in-out infinite;
                max-width: 350px;
            }
        </style>
    @endsection

    @include('components.intro')

    <div class="container mb-5" id="">

        <div class="row pb-5" id="">

            <div class="col-12 pb-5" id="">
                <!--Main layout-->
                <div class="" id="about_me_portfolio">

                    <!-- Section About -->
                    <section id="about" class="section feature-box mb-5">

                        <!-- Section title -->
                        <h2 class="text-center text-uppercase my-5 pt-5 wow fadeIn" data-wow-delay="0.2s"
                            style="visibility: visible; animation-name: fadeIn; animation-delay: 0.2s;">About
                            <strong>me</strong></h2>

                        <div class="container d-flex align-items-center justify-content-center flex-column">
                            <img src="{{ asset('/images/about_me_image.png') }}"
                                 class="img-fluid rounded-circle img-responsive avatar" alt="Tramaine Jackson Image"/>
                        </div>

                        <h4 class="text-center w-responsive mx-auto wow fadeIn my-5" data-wow-delay="0.2s"
                            style="visibility: visible; animation-name: fadeIn; animation-delay: 0.2s;">{{ $setting->about_me }}</h4>

                    </section>
                    <!-- /.Second section -->

                </div>
                <!-- /.First container -->
            </div>
        </div>

        <hr class="mt-5"/>
    </div>
    <!--/Main layout-->
</x-app-layout>
