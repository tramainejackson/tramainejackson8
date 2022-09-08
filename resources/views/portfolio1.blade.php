<x-app-layout>

    @section('addt_scripts')
        <script type="text/javascript">
            var $projects = $('[class*=projectCard]');
            var $projectsHeight = getTallest();

            $('#smallBusinessNav').remove();

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

    @include('components.intro')

    <div class="container" id="">

        <div class="row" id="">

            <div class="col-12" id="">
                <!--Main layout-->
                <div class="" id="about_me_portfolio">

                    <!-- Section About -->
                    <section id="about" class="section feature-box mb-5">

                        <!-- Section title -->
                        <h2 class="text-center text-uppercase my-5 pt-5 wow fadeIn" data-wow-delay="0.2s"
                            style="visibility: visible; animation-name: fadeIn; animation-delay: 0.2s;">About
                            <strong>me</strong></h2>

                        <h4 class="text-center w-responsive mx-auto wow fadeIn my-5" data-wow-delay="0.2s"
                            style="visibility: visible; animation-name: fadeIn; animation-delay: 0.2s;">I'm a self
                            taught web developer from South West Philadelphia. After about 3 years of studying and
                            learning multiple coding languages, I started doing freelance development. After a total of
                            about 7 years working the craft, I accepted a position from a recruiter doing web
                            development for a digital menuboard company and have been developing with a great team since
                            2018.</h4>

                        <!-- First row -->
                        <div class="row features-big text-center wow fadeIn" data-wow-delay="0.4s"
                             style="visibility: visible; animation-name: fadeIn; animation-delay: 0.4s;">

                            <!-- First column -->
                            <div class="col-md-4 mb-5">

                                <!--Panel-->
                                <div class="card card-body hoverable">
                                    <i class="fas fa-laptop dark-grey- fa-3x mb-4" aria-hidden="true"></i>
                                    <h5 class="font-weight-bold text-uppercase mb-4">Freelancer</h5>
                                    <p class="dark-grey-text">No project is too big or too small. Let me know what you
                                        need.</p>
                                </div>
                                <!--/.Panel-->

                            </div>
                            <!-- /First column -->

                            <!-- Second column -->
                            <div class="col-md-4 mb-5">

                                <!--Panel-->
                                <div class="card card-body yellow hoverable">
                                    <i class="fas fa-code dark-grey-text fa-3x mb-4" aria-hidden="true"></i>
                                    <h5 class="font-weight-bold text-uppercase mb-4">Developer</h5>
                                    <p class="dark-grey-text">PHP is my preferred language but I speak fluent Python and
                                        ASP.</p>
                                </div>
                                <!--/.Panel-->

                            </div>
                            <!-- /.Second column -->

                            <!-- Third column -->
                            <div class="col-md-4 mb-5">

                                <!--Panel-->
                                <div class="card card-body hoverable">
                                    <i class="fas fa-pencil-alt dark-grey-text fa-3x mb-4" aria-hidden="true"></i>
                                    <h5 class="font-weight-bold text-uppercase mb-4">Designer</h5>
                                    <p class="dark-grey-text">If you have the vision, I can make it come alive for
                                        you.</p>
                                </div>
                                <!--/.Panel-->

                            </div>
                            <!-- /.Third column -->

                        </div>
                        <!-- /.First row -->

                    </section>
                    <!-- /.Second section -->

                </div>
                <!-- /.First container -->
            </div>

            <div class="col-12 px-0" id="">

                <!--Second container-->
                <div class="container-fluid py-4" style="background-color: #f3f3f5;" id="experience_portfolio">

                    <!-- Second section -->
                    <section id="skills">

                        <!-- First row -->
                        <div class="row py-5">

                            <!--First column-->
                            <div class="col-lg-6 col-md-12 mb-3 wow fadeIn" data-wow-delay="0.4s"
                                 style="visibility: visible; animation-name: fadeIn; animation-delay: 0.4s;">

                                <!--Section heading-->
                                <div class="d-flex justify-content-start">
                                    <h4 class="text-center text-uppercase mb-5 pb-3 mt-4 wow fadeIn"
                                        data-wow-delay="0.2s"
                                        style="visibility: visible; animation-name: fadeIn; animation-delay: 0.2s;">My
                                        <strong>experience</strong></h4>
                                </div>

                                <!--Description-->
                                <blockquote class="blockquote bq-warning mb-4">
                                    <div class="row"><i class="fas fa-briefcase fa-x mb-1 mr-3 ml-3 dark-grey-text"
                                                        aria-hidden="true"></i>
                                        <h5 class="font-weight-bold mb-3">DMB developer</h5>
                                    </div>
                                    <p class="font-weight-bold ml-1 dark-grey-text mb-2">August 2018 - Present
                                        ({{ $dmbDevTime }})</p>
                                    <p class="mb-0 ml-1 light-grey-text">Working with the great company called Xenial,
                                        Inc. We build Digital Menu Boards for restaurants. So when you get something to
                                        eat from fast food restaurants, and you see the animated menus, you'll know who
                                        made them.</p>
                                </blockquote>

                                <blockquote class="blockquote bq-warning mt-1 mb-4">
                                    <div class="row"><i class="fas fa-briefcase fa-x mb-1 mr-3 ml-3 dark-grey-text"
                                                        aria-hidden="true"></i>
                                        <h5 class="font-weight-bold mb-3">Freelance PHP developer</h5></div>
                                    <p class="font-weight-bold ml-1 dark-grey-text mb-2">November 2013 - Present
                                        ({{ $freelanceDevTime }})</p>
                                    <p class="mb-0 ml-1 light-grey-text">I've been developing websites with PHP since
                                        2013. All of my applications are built on top of the Laravel MVC with the
                                        Material Design Bootstrap framework. I also manage all of the application on my
                                        Virtual Private Servers running Linux.</p>
                                </blockquote>

                            </div>
                            <!--/First column-->

                            <!--Second column-->
                            <div class="col-lg-5 offset-lg-1 col-md-12 mb-4 wow fadeIn" data-wow-delay="0.4s"
                                 style="visibility: visible; animation-name: fadeIn; animation-delay: 0.4s;">

                                <!--Second heading-->
                                <div class="d-flex justify-content-start">
                                    <h4 class="text-center text-uppercase mb-5 pb-3 mt-4 wow fadeIn"
                                        data-wow-delay="0.2s"
                                        style="visibility: visible; animation-name: fadeIn; animation-delay: 0.2s;">
                                        Development <strong>Skills</strong></h4>
                                </div>

                                <!--Description-->
                                <p class="black-text text-uppercase font-weight-bold" align="justify">
                                    JavaScript/Jquery</p>
                                <div class="md-progress">
                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="25"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <p class="black-text text-uppercase font-weight-bold pt-3" align="justify">SQL</p>
                                <div class="md-progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="25"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <p class="black-text text-uppercase font-weight-bold pt-3" align="justify">HTML5</p>
                                <div class="md-progress">
                                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="25"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <p class="black-text text-uppercase font-weight-bold pt-3" align="justify">Linux</p>
                                <div class="md-progress">
                                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <p class="black-text text-uppercase font-weight-bold pt-3" align="justify">PHP</p>
                                <div class="md-progress">
                                    <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="25"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <p class="black-text text-uppercase font-weight-bold pt-3" align="justify">Photoshop
                                    (Adobe Suites)</p>
                                <div class="md-progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="25"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </div>
                            <!--/Second column-->

                        </div>
                        <!--/First row-->

                    </section>
                    <!-- /.Second section -->
                </div>
                <!--/Second container-->
            </div>

            <div class="col-12" id="">
                <!-- Streak -->
                <div class="streak streak-photo streak-md"
                     style="background-image:url('https://mdbootstrap.com/img/Photos/Horizontal/Work/12-col/img%20%2811%29.jpg')">
                    <div class="mask flex-center rgba-indigo-strong">
                        <div class="white-text smooth-scroll mx-4">
                            <h2 class="h2-responsive wow fadeIn mb-5" data-wow-delay="0.3s"><i class="fas fa-quote-left"
                                                                                               aria-hidden="true"></i>
                                The best way to predict the future is to invent it. <i class="fas fa-quote-right"
                                                                                       aria-hidden="true"></i></h2>
                            <h5 class="text-center font-italic wow fadeIn" data-wow-delay="0.4s">~ Alan Kay</h5>
                        </div>
                    </div>
                </div>
                <!-- /.Streak -->
            </div>
        </div>
    </div>

    <!-- Third container -->
    <div class="container" id="projects_portfolio">

        <!-- Fourth section -->
        <section id="works" class="section mb-5">

            <!-- Section title -->
            <h2 class="text-center text-uppercase my-5 pt-5 wow fadeIn" data-wow-delay="0.2s"
                style="visibility: visible; animation-name: fadeIn; animation-delay: 0.2s;">My <strong>projects</strong>
            </h2>

            <!-- Section description -->
            <p class="text-center w-responsive mx-auto wow fadeIn my-5"
               style="visibility: visible; animation-name: fadeIn;">With multiple projects currently active, take a look
                at the projects that are completed.</p>

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
                                                <h3 class="card-title pt-2"><strong>{{ $website->title }}</strong></h3>

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

            <!-- First row -->
            <div class="row wow fadeIn" data-wow-delay="0.4s"
                 style="visibility: visible; animation-name: fadeIn; animation-delay: 0.4s;">

                <!-- First column -->
                <div class="col-md-7 mx-auto my-5">

                    <div class="card" id="">

                        <div class="card-body" id="">
                            <div class="card-header" id="">
                                <h2 class="text-center">For more detailed coding, check out all my repositories on
                                    Github</h2>
                            </div>

                            <div class="text-center" id="">
                                <i class="fab fa-github-square fa-10x"></i>
                            </div>

                            <div class="card-text text-center" id="">
                                <h3>
                                    <span class="">Profile</span> - <a class=""
                                                                       href="https://github.com/tramainejackson">https://github.com/tramainejackson</a>
                                </h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- /.Fourth section -->

        <hr>

    </div>
    <!-- /.Third container -->

    <!--/Main layout-->
</x-app-layout>
