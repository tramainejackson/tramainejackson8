<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" id="companyRecruiterNav">
    {{-- COMPANY RECRUITER NAVIGATION--}}

    <!--Brand Link-->
    <a class="navbar-brand d-md-inline-block d-none" href="{{ route('web_index') }}"><strong>T<span class="text-light">J</span></strong></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="{{ str_contains(Route::currentRouteName(), 'portfolio') ? '#about_me_portfolio' : route('portfolio1').'#about_me_portfolio' }}" data-offset="60">About Tramaine</a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="{{ str_contains(Route::currentRouteName(), 'portfolio') ? '#experience_portfolio' : route('portfolio1').'#experience_portfolio' }}" data-offset="60">Experience</a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="{{ str_contains(Route::currentRouteName(), 'portfolio') ? '#projects_portfolio' : route('portfolio1').'#projects_portfolio' }}" data-offset="60">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="{{ route('questionnaires.index') }}" data-offset="60">Potential Projects</a>
            </li>

            @if(!Auth::check())
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="{{ str_contains(Route::currentRouteName(), 'portfolio') ? '#contact' : route('portfolio1').'#contact' }}" data-offset="60">Contact</a>
                </li>
            @endif

            @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="{{ route('websites.index') }}" data-offset="60">Websites</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="{{ route('settings') }}" data-offset="60">Settings</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @else
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link waves-effect" href="{{ route('login') }}">Login</a>--}}
                {{--</li>--}}
            @endif
        </ul>
    </div>
</nav>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" id="smallBusinessNav">
    {{-- SMALL BUSINESS NAVIGATION--}}

    <!--Brand Link-->
    <a class="navbar-brand d-md-inline-block" href="{{ route('web_index') }}"><strong>T<span class="text-light">J</span></strong></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="{{ route('about') }}" data-offset="60">About Tramaine</a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="{{ str_contains(Route::currentRouteName(), 'portfolio') ? '#projects_portfolio' : route('portfolio2').'#projects_portfolio' }}" data-offset="60">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="{{ route('questionnaires.index') }}" data-offset="60">Potential Projects</a>
            </li>

            @if(!Auth::check())
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="{{ str_contains(Route::currentRouteName(), 'portfolio') ? '#contact' : route('portfolio2').'#contact' }}" data-offset="60">Contact</a>
                </li>
            @endif

            @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="{{ route('messages') }}" data-offset="60">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="{{ route('websites.index') }}" data-offset="60">Websites</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="{{ route('settings') }}" data-offset="60">Settings</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @else
            @endif
        </ul>
    </div>
</nav>