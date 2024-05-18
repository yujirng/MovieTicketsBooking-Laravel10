<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css"
        rel="stylesheet">
    <style>
        .front {
            margin: 5px 4px 45px 0;
            background-color: #EDF979;
            color: #000000;
            padding: 9px 0;
            border-radius: 3px;
        }
    </style>
</head>

<div class="container py-5">
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-6">BOOKING SUMMARY</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mx-auto">
            <p id="msg" class="pl-3 text-danger"></p>
            <div class="card bill-card">
                <div class="card-header bill-header">
                    <div class="row">
                        <h5 class="card-title">Booking Details</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>Your Name: {{ $bookingData['user']->name }}</p>
                            <p>Phone number: {{ $bookingData['user']->phone }}</p>
                            <p>Email: {{ $bookingData['user']->email }}</p>
                            <!-- Hiển thị các thông tin khác của người dùng -->
                            <!-- Hiển thị các thông tin về suất chiếu và phim -->
                            <p>Movie Name: {{ $bookingData['bookingInfo']->movie->title }}</p>
                            <p>Theater: {{ $bookingData['bookingInfo']->theater->theater_name }}</p>
                            <p>Show Date: {{ $bookingData['showDate'] }}</p>
                            <p>Time: {{ $bookingData['showTime'] }}</p>
                            <!-- Hiển thị các thông tin khác của suất chiếu -->
                            <hr>
                            <p>Seats: {{ $bookingData['selectedSeats'] }}</p>
                            <p>Total Seats: {{ $bookingData['totalSeats'] }}</p>
                            <p>Booking Date: {{ date('l, d-m-Y', strtotime('today')) }}</p>
                            <p>Total Price: {{ $bookingData['totalPrice'] }} đ</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-6">
                            <form action="{{ route('paymentForm') }}" method="POST">
                                @csrf
                                <input type="hidden" name="showtimeId" value="{{ $bookingData['showtimeId'] }}">
                                <input type="hidden" name="userId" value="{{ $bookingData['user']->id }}">
                                <input type="hidden" name="seats" value="{{ $bookingData['selectedSeats'] }}">
                                <input type="hidden" name="total-seats" value="{{ $bookingData['totalSeats'] }}">
                                <input type="hidden" name="total-price" value="{{ $bookingData['totalPrice'] }}">
                                <input type="hidden" name="booking-date"
                                    value="{{ date('Y-m-d', strtotime('today')) }}">
                                <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm">
                                    Thanh toán VNPay
                                </button>
                            </form>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('payment.momo') }}" method="POST">
                                @csrf
                                <input type="hidden" name="showtimeId" value="{{ $bookingData['showtimeId'] }}">
                                <input type="hidden" name="userId" value="{{ $bookingData['user']->id }}">
                                <input type="hidden" name="seats" value="{{ $bookingData['selectedSeats'] }}">
                                <input type="hidden" name="total-seats" value="{{ $bookingData['totalSeats'] }}">
                                <input type="hidden" name="total-price" value="{{ $bookingData['totalPrice'] }}">
                                <input type="hidden" name="booking-date"
                                    value="{{ date('Y-m-d', strtotime('today')) }}">
                                <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm">
                                    Thanh toán Momo
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/jquery.nicescroll.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.slicknav.js"></script>
<script src="assets/js/mixitup.min.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>
