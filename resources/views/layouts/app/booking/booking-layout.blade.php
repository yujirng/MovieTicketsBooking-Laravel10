<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Booking</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Recursive&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('template/app/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/app/css/seatbooking.css') }}">

    <style>
        .seat-layout {
            background-color: #e2e8f0;
        }

        .payment-layout {
            background-color: #ffedd5;
        }
    </style>

    @yield('style')

</head>

<body class="bg-white">
    <div class="container-fluid vh-100">
        <div class="row bg-dark">
            <nav class="navbar navbar-expand-lg navbar-dark mx-auto">
                <a class="navbar-brand text-warning" href="#">Azir Cinema</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="#">Select Movie/Theater/Showtime<span
                                class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link active">Select Seats</a>
                        <a class="nav-item nav-link">Select Snacks</a>
                        <a class="nav-item nav-link">Checkout</a>
                    </div>
                </div>
            </nav>
        </div>

        <h2 class="mt-2 mb-2">BOOK YOUR SEAT NOW</h2>

        <div class="container">
            @yield('main')
        </div>
    </div>

    @yield('scripts')

</body>

</html>
