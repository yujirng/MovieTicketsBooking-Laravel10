<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link rel="stylesheet" href="/template/app/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/template/app/css/font-awesome.min.css" type="text/css">
    {{-- <link rel="stylesheet" href="/template/app/css/elegant-icons.css" type="text/css"> --}}
    <link rel="stylesheet" href="/template/app/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/template/app/css/nice-select.css" type="text/css">
    <!--<link rel="stylesheet" href="/template/app/css/owl.carousel.min.css" type="text/css">-->
    <link rel="stylesheet" href="/template/app/css/slicknav.min.css" type="text/css">
</head>

<body>
    <div class="container vh-100">
        <div class="row justify-content-sm-center my-auto h-100 align-items-center">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="text-center my-5 ms-auto w-100">
                                <img src="{{ asset('template/app/images/logo.png') }}" alt="logo"
                                    style="height: 100px;">
                            </div>
                        </div>
                        <h4 class="fs-4 card-title fw-bold mb-4">Login</h4>
                        @include('partials.notify')

                        <form method="POST" action="{{ route('login') }}" class="needs-validation">
                            @csrf
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value=""
                                    required autofocus>
                            </div>

                            <div class="mb-3">
                                <div class="mb-2 w-100 d-flex justify-content-between">
                                    <label class="text-muted" for="password">Password</label>
                                    <a href="forgot.html">
                                        Forgot Password?
                                    </a>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>

                            <div class="d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                    <label for="remember" class="form-check-label">Remember Me</label>
                                </div>
                                <button type="submit" class="btn btn-primary ms-auto">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            Don't have an account? <a href="{{ route('register') }}" class="text-dark">Create One</a>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-5 text-muted">
                    Copyright &copy; 2024 &mdash; &#64;Azir-Cinema
                </div>
            </div>
        </div>
    </div>
</body>
