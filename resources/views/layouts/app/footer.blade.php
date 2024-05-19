<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="#"><img src="{{ asset('template/app/images/logo.png') }}" alt=""></a>
                    </div>
                    <p>The customer is at the heart of our unique business model, which inculde online movie book show.
                    </p>
                    <a href="#"><img src="{{ asset('template/app/images/payment.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Menu</h6>
                    <ul>
                        <li><a href="{{ route('app.index') }}">Home</a></li>
                        <li><a href="{{ route('app.movies.all') }}">All Movies</a></li>
                        <li><a href="{{ route('app.about') }}">About Us</a></li>
                        <li><a href="{{ route('app.feedback') }}">Feedback</a></li>
                        <li><a href="{{ route('app.contacts') }}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Category</h6>
                    <ul>
                        {{-- <li><a href="{{ route('app.movies.all') }}">Action</a></li>
                        <li><a href="{{ route('app.movies.all') }}">Drama</a></li>
                        <li><a href="{{ route('app.movies.all') }}">Comedy</a></li>
                        <li><a href="{{ route('app.movies.all') }}">History</a></li>
                        <li><a href="{{ route('app.movies.all') }}">Hrror</a></li> --}}
                        @foreach ($genres as $genre_name)
                            <li><a href="{{ route('app.movies.all') }}">{{ $genre_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                <div class="footer__widget">
                    <h6>LOCATION</h6>
                    <div class="footer__newslatter">
                        <p>Azir Cinema, Nha Trang,
                            Khanh Hoa
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="footer__copyright__text">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <p>Copyright ©
                        2023
                    </p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{ asset('template/app/js/jquery-3.3.1.min.js') }}"></script>
{{-- <script src="{{ asset('template/app/js/bootstrap.min.js') }}"></script> --}}
<script src="{{ asset('template/app/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('template/app/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('template/app/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('template/app/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('template/app/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('template/app/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('template/app/js/mixitup.min.js') }}"></script>
{{-- <script src="{{ asset('js/owl.carousel.min.js') }}"></script> --}}
<script src="{{ asset('template/app/js/main.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
