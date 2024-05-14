<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
        <div class="offcanvas__links">
            <a href="login.html">Sign in</a>
        </div>
    </div>
    <div id="mobile-menu-wrap"></div>

</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">

                </div>

                @if (Auth::check())
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <div class="dropdown">
                                    <button class="btn btn-fix btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        @if (Auth::user()->image == '')
                                            <img src="{{ asset('template/app/images/default.jpg') }}" alt="Avatar"
                                                class="avatar mr-2">
                                        @else
                                            <img src="{{ Storage::url(Auth::user()->image) }}" alt="Avatar"
                                                class="avatar mr-2">
                                        @endif
                                        <span class="font-weight-bold mr-1">{{ Auth::user()->username }}</span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="{{ route('user.information') }}"><i
                                                    class="fa fa-user"></i>
                                                Account</a></li>
                                        <li><a class="dropdown-item" href="{{ route('user.booking.history') }}"><i
                                                    class="fa fa-ticket"></i> History Booking</a></li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                    <i class="fa fa-sign-out"></i> Logout
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <a class="top__links--unlogin" href="{{ route('login') }}">Sign in</a>
                                <a class="top__links--unlogin" href="{{ route('register') }}">Register</a>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="{{ route('app.index') }}"><img src="{{ asset('template/app/images/logo.png') }}"
                            alt="" style="width: 150px;"></a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li><a href="{{ route('app.index') }}">Home</a></li>
                        <li><a href="{{ route('app.movies.all') }}">All Movies</a></li>
                        <li><a href="{{ route('app.about') }}">About US</a></li>
                        <li><a href="{{ route('app.feedback') }}">Feedback</a></li>
                        <li><a href="{{ route('app.contacts') }}">Contacts</a></li>
                    </ul>
                </nav>
            </div>

        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
