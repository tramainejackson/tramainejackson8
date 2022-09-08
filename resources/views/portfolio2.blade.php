<x-app-layout>

    @section('addt_scripts')
        <script type="text/javascript">
            /* Javacript to set the time once */

            set('hours', 30 * new Date().getHours());
            set('minutes', 6 * new Date().getMinutes());
            set('seconds', 10 * new Date().getSeconds());

            function set(id, deg) {
                var el = document.getElementById(id),
                    rotation = 'rotate(' + deg + 'deg)';

                el.style.transform = rotation;
                el.style.webkitTransform = rotation;
            }


            var $projects = $('[class*=projectCard]');
            var $projectsHeight = getTallest();

            $('#companyRecruiterNav').remove();

            function getTallest() {
                var tallest = 0;

                $($projects).each(function () {
                    $(this).height();

                    $(this).height() > tallest ? tallest = $(this).height() : '';
                });

                return tallest;

            }

            function makeTallest() {
                $($projects).each(function () {
                    $(this).css({'min-height': $projectsHeight + 'px'});
                    $(this).children().css({'min-height': $projectsHeight + 'px'});
                });
            }

            makeTallest();
        </script>
    @endsection

    @section('addt_styles')
        <style>
            .wrapper2 {
                width: 100%;
                min-width: 30%;
                margin: 0px 0;
                transition: 0.6s;
                transform-style: preserve-3d;
                position: relative;
                -webkit-transition: all 0.7s ease;
                transition: all 0.7s ease;
                background: #fff
            }


            .wrapper h1 {
                font-weight: 200;
                letter-spacing: 5px;
                text-align: center;
                padding-top: 20px;
                padding-bottom: 20px;
                color: #fff;
                text-shadow: text-shadow: 2px 2px #ff0000;
                text-shadow: 2px 2px #888;
            }


            .skills {
                position: relative;
                background: #fff;
                -moz-border-radius: 25px;
                -webkit-border-radius: 25px;
                border-radius: 25px;
                padding: 10px;
                box-shadow: inset 0 -1px 1px rgba(255, 255, 255, 0.3);
            }

            .skills ul {
                list-style: none;
                width: 100%;
                overflow-x: hidden;
                overflow-y: auto;
                text-align: center;
                margin: 0 auto;
                padding-left: 35px;
            }

            .skills li {
                padding-right: 40px;
                height: 150px;
                display: inline-block;
                list-style: none;
                overflow: hidden !important;
                margin-right: 10px;
                padding: 10px;
                text-align: center;
                width: 100px;
                padding-left: 0px;
                vertical-overflow: hidden;
                scroll: hidden;
                height: 125px;
                margin-left: -45px;
            }

            .responsive-circle {
                font-size: 80px;
                font-weight: 700;
                margin: 0 auto 20px;
                width: 80%;
                height: 67%;
                background: #ccc;
                z-index: 999999;
                border-radius: 50%;
                border: 6px dashed #fff;
                transform: rotate (180deg);
                -ms-transform: rotate(7deg);
                -webkit-transform: rotate(7deg);
                transform: rotate(7deg);
                background-image: -webkit-repeating-linear-gradient(left, hsla(0, 0%, 100%, 0) 0%, hsla(0, 0%, 100%, 0) 6%, hsla(0, 0%, 100%, .1) 7.5%), -webkit-repeating-linear-gradient(left, hsla(0, 0%, 0%, 0) 0%, hsla(0, 0%, 0%, 0) 4%, hsla(0, 0%, 0%, .03) 4.5%), -webkit-repeating-linear-gradient(left, hsla(0, 0%, 100%, 0) 0%, hsla(0, 0%, 100%, 0) 1.2%, hsla(0, 0%, 100%, .15) 2.2%), -webkit-linear-gradient(-90deg, hsl(0, 0%, 78%) 0%, hsl(0, 0%, 90%) 47%, hsl(0, 0%, 78%) 53%, hsl(0, 0%, 70%) 100%);
                -webkit-animation: rotate 9s linear 0s infinite normal;
                -moz-animation: rotate 9s linear 0s infinite normal;
                -o-animation: rotate 9s linear 0s infinite normal;
                -ms-animation: rotate 9s linear 0s infinite normal;
                animation: rotate 9s linear 0s infinite normal;
            }

            .responsive-circle::after {
                border-radius: 50%;
                content: "";
                display: block;
                height: 0;
                margin-bottom: 20px;
                padding-bottom: 100%;
                width: 100%;
            }

            .responsive-circle div {
                color: white;
                line-height: 1em;
                margin-top: -0.5em;
                padding-top: 50%;
                width: 20%;
                height: 20%;
                margin: 0 auto;
                padding-top: 5px;
                box-shadow: 2px 2px 5px #888888;
                margin-top: 23px;
                border-radius: 90%;
                font-size: 25px;
                font-family: Verdana;
                font-weight: 200;
                background: #fff;
                content: "'";
            }

            @-webkit-keyframes rotate {
                from {
                    -webkit-transform: rotate(0deg);

                }
                to {
                    -webkit-transform: rotate(360deg);
                }
            }

            @-moz-keyframes rotate {
                from {
                    -moz-transform: rotate(0deg);

                }
                to {
                    -moz-transform: rotate(360deg);
                }
            }

            @-o-keyframes rotate {
                from {
                    -o-transform: rotate(0deg);

                }
                to {
                    -o-transform: rotate(360deg);
                }
            }

            @-ms-keyframes rotate {
                from {
                    -ms-transform: rotate(0deg);

                }
                to {
                    -ms-transform: rotate(360deg);
                }
            }

            @keyframes rotate {
                from {
                    transform: rotate(0deg);

                }
                to {
                    transform: rotate(360deg);
                }
            }

            @media only screen and (max-width: 575.99px) {
                #projects_portfolio {
                    /*margin-top: 450px;*/
                }

                #content_continued2 {
                    /*margin-top: 450px;*/
                }
            }
        </style>
    @endsection

        <div class="container-fluid" id="">

            <div class="row" id="">

                <div class="col-12 p-0" id="">

                    <!--Intro-->
                    <header>
                        <!-- Intro Section -->
                        <div id="" class="view"
                             style="min-height: 100vh; background-image: url('{{ asset('storage/images/building_bgrd.jpg') }}'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
                            <div class="mask rgba-white-strong d-flex justify-content-center align-items-center">
                                <div class="container">
                                    <div class="row smooth-scroll">
                                        <div class="col-md-12 pt-3">
                                            <div class="white-text text-center pt-5">
                                                <h1 class="display-1 mb-4 dark-grey-text wow fadeInUpBig d-none d-md-block"
                                                    data-wow-delay="0.6s">Tramaine<strong
                                                        class="text-info">Jackson</strong></h1>
                                                <h1 class="display-1 dark-grey-text wow fadeInUpBig d-md-none mb-0"
                                                    data-wow-delay="0.6s">Tramaine</h1>
                                                <h1 class="display-1 mb-4 dark-grey-text wow fadeInUpBig d-md-none mt-0"
                                                    data-wow-delay="0.6s"><strong class="text-info">Jackson</strong>
                                                </h1>
                                                <h5 class="text-uppercase text-primary font-weight-bold wow fadeInUp"
                                                    data-wow-delay="0.s">Web developer</h5>
                                                <a href="#about"
                                                   class="btn btn-floating btn-large blue wow fadeInDown waves-effect waves-light"
                                                   data-wow-delay="0.6s" data-offset="100"><i class="fas fa-angle-down"
                                                                                              aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </header>
                    <!--/Intro-->
                </div>
            </div>

            <!-- First row -->
            <div class="row rgba-mdb-color-light">

                <div class="col-12 px-0 wow fadeIn wrapper" data-wow-delay="0.4s"
                     style="visibility: visible; animation-name: fadeIn; animation-delay: 0.4s;">
                    <!--Description-->
                    <p class="particle elem1 anim-delay1" align="justify">JavaScript/Jquery</p>
                    <p class="particle elem2 anim-delay3" align="justify">SQL</p>
                    <p class="particle elem3 anim-delay10" align="justify">HTML5</p>
                    <p class="particle elem8 anim-delay11" align="justify">Linux</p>
                    <p class="particle elem18 anim-delay8" align="justify">WordPress</p>
                    <p class="particle elem6 anim-delay12" align="justify">Drupal</p>
                    <p class="particle elem4 anim-delay4" align="justify">Wix</p>
                    <p class="particle elem5 anim-delay14" align="justify">SquareSpace</p>
                    <p class="particle elem12 anim-delay18" align="justify">GoDaddy</p>
                    <p class="particle elem10 anim-delay2" align="justify">PHP</p>
                    <p class="particle elem9 anim-delay6" align="justify">Photoshop</p>

                    <!--Second column-->
                    <div class="d-flex align-items-center justify-content-center h-100 wow fadeIn wrapper"
                         data-wow-delay="0.4s"
                         style="visibility: visible; animation-name: fadeIn; animation-delay: 0.4s;">
                        <div class="card card-circle z-depth-4 w-75 rgba-black-strong white-text" id="" style="">
                            <div class="card-body text-center p-0" id="">
                                <h1 class="card-title m-0 py-3 px-5 coolText3 display-3">HUH?</h1>

                                <div class="divider-new" id=""></div>

                                <h4 class="px-5 h4-responsive pb-5">Wix? Squarespace? WordPress? Weebly? I'm pretty sure
                                    you've come across these
                                    across these websites or applications at some point in time during your search for
                                    building a website. And
                                    maybe you've gone as far as trying to do it yourself. Inevitably, it can be a bit
                                    overwhelming when you're trying to run a business.
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Second column-->
            </div>
        </div>

        <!--Second container-->
        <div class="container-fluid py-5" id="content_continued1"
             style="background-image: linear-gradient(rgba(255,255,255,0.8), rgba(255,255,255,0.8), rgba(255,255,255,1)), url({{ asset('images/puzzle3.png') }}); background-position: center center; background-repeat: no-repeat">

            <section id="" class="section mb-5 py-5 d-flex align-items-center justify-content-center flex-column h-100">

                <!-- Section title -->
                <h2 class="text-center text-uppercase mb-5 pt-5 wow zoomInLeft coolText3 display-4 w-75 text-dark"
                    data-wow-delay="0.4s"
                    style="visibility: visible; animation-name: zoomInLeft; animation-delay: 0.2s;">I'll Take Care Of
                    The Mumbo Jumbo</h2>

                <!-- Section description -->
                <h4 class="text-center w-responsive mx-auto wow zoomInRight my-5 text-dark" data-wow-delay="0.4s"
                    style="visibility: visible; animation-name: zoomInRight;">At the end of the day, they come together
                    to complete the same task. Which is to create something that allows you to reach your customers and
                    tell them about your vision and products.</h4>

                <!-- First row -->
                <div class="row wow fadeIn" data-wow-delay="0.4s"
                     style="visibility: visible; animation-name: fadeIn; animation-delay: 0.4s;">

                </div>
            </section>
        </div>
        <!--/Second container-->

        <!--Third container-->
        <div class="container-fluid py-5" id="content_continued2" style="">

            <div class="row align-items-center justify-content-center h-100 mx-1" id="">

                <section id="" class="section mb-5">

                    <div class="row d-flex justify-content-center align-items-center mb-5 pb-5 flex-column flex-md-row"
                         id="">
                        <!-- Section title -->
                        <h2 class="text-center text-uppercase pt-5 col-12 col-md-4 coolText3" style=""><span
                                class="animated pulse infinite wow d-inline-block d-md-block delay-1s slow ml-0 ml-md-n5"
                                data-wow-iteration="infinite">LET</span> <span
                                class="animated pulse infinite wow d-inline-block d-md-block delay-2s slow ml-0 ml-md-n2"
                                data-wow-iteration="infinite">ME</span> <span
                                class="animated pulse infinite wow d-inline-block d-md-block delay-3s slow ml-0 ml-md-5"
                                data-wow-iteration="infinite">HELP</span> <span
                                class="animated pulse infinite wow d-inline-block d-md-block delay-4s slow ml-0 ml-md-5 mr-0 mr-md-n5"
                                data-wow-iteration="infinite">YOU</span></h2>

                        <h4 class="text-center wow fadeIn pt-5 col-12 col-md-4" data-wow-delay="0.2s"
                            style="visibility: visible; animation-name: fadeIn; animation-delay: 0.2s;">My goal is to
                            take all of the worry out of getting a great functional website so you can manage the
                            important stuff of your business.</h4>
                    </div>

                    <!-- First row -->
                    <div class="row features-big text-center wow fadeIn" data-wow-delay="0.4s"
                         style="visibility: visible; animation-name: fadeIn; animation-delay: 0.4s;">

                        <!-- First column -->
                        <div class="col-12 col-md-4 mb-5">

                            <!--Panel-->
                            <div class="card card-body hoverable">
                                <div class="wrapper2">
                                    <div class="skills">
                                        <ul>
                                            <li>
                                                <div class="responsive-circle">
                                                    <div class="circle-inner"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="responsive-circle nyc-circle">
                                                    <div class="circle-inner"></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5 class="font-weight-bold text-uppercase mb-4">Functionality</h5>
                                <p class="dark-grey-text">I'll help you keep everything organized in one central
                                    location.</p>
                            </div>
                            <!--/.Panel-->

                        </div>
                        <!-- /First column -->

                        <!-- Second column -->
                        <div class="col-12 col-md-4 mb-5">

                            <!--Panel-->
                            <div class="card card-body white-text"
                                 style="background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab); background-size: 400% 400%; animation: gradient 15s ease infinite;">
                                <i class="fas fa-palette fa-7x mb-4"></i>
                                <h5 class="font-weight-bold text-uppercase mb-4 pt-3">Design</h5>
                                <p class="">Let's talk about your vision and make it come alive.</p>
                            </div>
                            <!--/.Panel-->

                        </div>
                        <!-- /.Second column -->

                        <!-- Third column -->
                        <div class="col-12 col-md-4 mb-5">

                            <!--Panel-->
                            <div class="card card-body hoverable">
                                <div id="clock" class="mb-4">
                                    <div id="hours"></div>
                                    <div id="minutes"></div>
                                    <div id="seconds"></div>
                                </div>
                                <h5 class="font-weight-bold text-uppercase mb-4">Accessiblity</h5>
                                <p class="dark-grey-text">I'll make sure that your website is available to you and your
                                    customers 24/7.</p>
                            </div>
                            <!--/.Panel-->

                        </div>
                        <!-- /.Third column -->

                    </div>
                    <!-- /.First row -->

                </section>
            </div>

        </div>
        <!--/Third container-->

        <!-- Third container -->
        <div class="container" id="projects_portfolio">

            <!-- Fourth section -->
            <section id="works" class="section mb-5">

                <!-- Section title -->
                <h2 class="text-center text-uppercase my-5 pt-5 wow fadeIn coolText3 display-4" data-wow-delay="0.2s"
                    style="visibility: visible; animation-name: fadeIn; animation-delay: 0.2s;">My <strong
                        class="text-dark">projects</strong></h2>

                <!-- Section description -->
                <p class="text-center w-responsive mx-auto wow fadeIn my-5"
                   style="visibility: visible; animation-name: fadeIn;">With multiple projects currently active, take a
                    look at the projects that are completed.</p>

                <!-- First row -->
                <div class="row wow fadeIn" data-wow-delay="0.4s"
                     style="visibility: visible; animation-name: fadeIn; animation-delay: 0.4s;">

                    <!-- First column -->
                    <div class="col-md-12 mb-5">

                        <div class="row" id="">

                            @foreach($websites as $website)

                                @if($website->active == 'Y')

                                    <div class="col-12 col-lg-6 my-2" id="">

                                        <!-- Card -->
                                        <div class="card card-image projectCard{{ $loop->iteration }}"
                                             style="background-image: url({{ asset('storage/images/'. $website->logo .'') }});">

                                            <!-- Content -->
                                            <div
                                                class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">

                                                <div>
                                                    <!-- Title -->
                                                    <h3 class="card-title pt-2"><strong>{{ $website->title }}</strong>
                                                    </h3>

                                                    <!-- Website Descr/Bio -->
                                                    <p>{{ $website->description }}</p>

                                                    <!-- Website Link -->
                                                    <a href="{{ $website->link }}" target="_blank" class="btn btn-pink"><i
                                                            class="fas fa-clone left"></i> View project</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card -->
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- /.First column -->
                </div>
                <!-- /.First row -->
            </section>
            <!-- /.Fourth section -->

            <hr>

        </div>
        <!-- /.Third container -->

        <!--/Main layout-->
</x-app-layout>
