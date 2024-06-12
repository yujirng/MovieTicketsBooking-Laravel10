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
        <div class="row justify-content-sm-center h-100 align-items-center">
            <div class="col-xxl-8 col-xl-9 col-lg-9 col-md-8 col-sm-9">
                <div class="card shadow-lg">
                    <div class="card-body py-3 px-5">
                        <div class="row">
                            <div class="text-center my-2 ms-auto w-100">
                                <img src="{{ asset('template/app/images/logo.png') }}" alt="logo"
                                    style="height: 100px;">
                            </div>
                        </div>
                        <h4 class="fs-4 card-title fw-bold mb-4">Register</h4>
                        @include('partials.notify')
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
                            class="needs-validation">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="name">Name</label>
                                        <input id="name" type="text" class="form-control" name="name"
                                            value="" required autofocus>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="password">Phone Number</label>
                                        <input id="password" type="phone" class="form-control" name="phonenumber"
                                            required>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="password">Password</label>
                                        <input id="password" type="password" class="form-control" name="password"
                                            required>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="gender">Gender</label>
                                        <div class="d-flex justify-content-start">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="genderMale"
                                                    name="gender" value="0" required checked>
                                                <label class="form-check-label" for="genderMale">Male</label>
                                            </div>
                                            <div class="form-check ml-4">
                                                <input class="form-check-input" type="radio" id="genderFemale"
                                                    name="gender" value="1">
                                                <label class="form-check-label" for="genderFemale">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="password">Date of Birth</label>
                                        <input id="password" type="date" class="form-control" name="birthday"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="image">Image:</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            <div class="justify-content-between align-items-center d-flex">
                                <p class="form-text text-muted mb-3">
                                    <input type="checkbox" required>
                                    By registering you agree with our terms and condition.
                                </p>
                                <button type="submit" class="btn btn-primary ms-auto">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            Already have an account? <a href="{{ route('login') }}" class="text-dark">Login</a>
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
