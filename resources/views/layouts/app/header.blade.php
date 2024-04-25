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

                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__links">
                            <a class="top__links--unlogin" href="login.php">Sign in</a>
                            <a class="top__links--unlogin" href="register.php">Register</a>
                        </div>
                    </div>
                </div>

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
