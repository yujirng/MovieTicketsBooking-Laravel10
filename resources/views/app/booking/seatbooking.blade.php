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
        .text {
            color: black;
        }

        body {
            background-color: white;
        }

        .screen {
            background-color: black;
        }

        .seat {
            width: 35px;
            height: 30px;
            margin: 5px;
            background-color: #ccc;
            border: 1px solid #000;
        }

        .seat-sample {
            width: 30px;
            height: 30px;
            margin: 5px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .back-link {
            margin: 25px;
            margin-right: 150px;
        }

        h2 {
            margin: 5px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Azir movie</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Chọn phim/Rạp/Suất <span
                        class="sr-only">(current)</span></a>
                <a class="nav-item nav-link">Chọn ghế</a>
                <a class="nav-item nav-link">Chọn thức ăn</a>
                <a class="nav-item nav-link">Thanh toán</a>
            </div>
        </div>
    </nav>

    <h2 class="mt-5">BOOK YOUR SEAT NOW</h2>

    <div class="container">
        <form action="{{ route('payment') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-7">
                    <div class="screen mb-5"></div>

                    <div class="seats-container mx-auto">
                        <div class="row d-flex justify-content-center align-items-center">
                            @foreach (['A1', 'A2', 'A3', 'A4', 'B1', 'B2', 'B3', 'B4'] as $seat)
                                @php
                                    $seatClass = in_array($seat, $occupiedSeats) ? 'occupied' : '';
                                @endphp
                                <div class="seat {{ $seatClass }}" data-seat="{{ $seat }}"></div>
                            @endforeach
                        </div>

                        <div class="row d-flex justify-content-center align-items-center">
                            @foreach (['C1', 'C2', 'C3', 'C4', 'D1', 'D2', 'D3', 'D4'] as $seat)
                                @php
                                    $seatClass = in_array($seat, $occupiedSeats) ? 'occupied' : '';
                                @endphp
                                <div class="seat {{ $seatClass }}" data-seat="{{ $seat }}"></div>
                            @endforeach
                        </div>

                        <div class="row d-flex justify-content-center align-items-center">
                            @foreach (['E1', 'E2', 'E3', 'E4', 'F1', 'F2', 'F3', 'F4'] as $seat)
                                @php
                                    $seatClass = in_array($seat, $occupiedSeats) ? 'occupied' : '';
                                @endphp
                                <div class="seat {{ $seatClass }}" data-seat="{{ $seat }}"></div>
                            @endforeach
                        </div>
                    </div>

                    <ul class="showcase mt-5">
                        <li>
                            <div class="seat"></div>
                            <small class="text-white">Available</small>
                        </li>
                        <li>
                            <div class="seat-sample selected" style="background-color: #00FFFF"></div>
                            <small class="text-white">Selected</small>
                        </li>
                        <li>
                            <div class="seat-sample occupied" style="background-color: white"></div>
                            <small class="text-white">Occupied</small>
                        </li>
                    </ul>
                    <p class="text text-center mt-3">You have selected <span id="selected-count">0</span> seats for the
                        price of $<span id="selected-price">0</span></p>

                    <input type="hidden" name="total_price" value="">
                    <input type="hidden" name="showtimeId" value="{{ $showtimeId }}">
                    <div class="hr" style="border-bottom: 3px solid #FFA500;"></div>

                </div>
                <div class="col-lg-5">
                    <div class="hr" style="border-bottom: 3px solid #FFA500; margin:10px"></div>
                    <table>
                        <tr>
                            <td><img src="uploads/{{ $movieImage }}" width="200" height="300"></td>
                            <td>
                                <font size=6 style="font-family: Shruti; color:black">{{ $movieTitle }}</font>
                                <font size="3px" style="display: block; color:black">2D phụ đề</font>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <font size="4px" style="font-weight: bold; color:black">Suất:</font>
                                <font size=3 style="color:black">{{ $showTime }}</font>
                            </td>
                            <td>
                                <font size="4px" style="font-weight: bold; color:black">- Ngày:</font>
                                <font size=3 style="color:black">{{ $showDate }}</font>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #FFA500">------------------------------</td>
                            <td style="color: #FFA500">------------------------------</td>
                        </tr>
                        <tr>
                            <td><input type="text" id="selected-seats" name="selected-seats"
                                    placeholder="selected checkboxs" readonly></td>
                            <td><input type="text" id="count" name="total-seats" placeholder="Total Seats"
                                    readonly></td>
                        </tr>
                    </table>

                    <!-- check login -->
                    {{-- @if (!isset($_SESSION['username'])) --}}
                    @if (false)
                        <div class="col-lg-12">
                            <div class="form-group">
                                <a data-toggle="modal" data-target="#need-login"
                                    class="form-control btn btn-primary py-2">
                                    <font style="color:white;">Payment Now</font>
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="button-group">
                                    <a href="javascript:window.history.back(-1);" class="back-link">Back</a>
                                    <input type="submit" value="Payment Now" name="submit"
                                        class="form-control btn btn-primary py-2">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="need-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="text-dark">You need to login</h3>
                    <a class="btn btn-primary btn-sm" href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var selectedSeats = [];
            var maxSeats = 8;
            var showPrice = <?php echo $showPrice; ?>;
            var selectedPrice = 0;

            $('.seat').click(function() {
                var seat = $(this).data('seat');

                if ($(this).hasClass('occupied')) {
                    return;
                }

                if (selectedSeats.length >= maxSeats) {
                    if ($(this).hasClass('selected')) {
                        $(this).removeClass('selected');
                        selectedSeats = selectedSeats.filter(function(value) {
                            return value !== seat;
                        });
                        selectedPrice -= showPrice;
                    } else {
                        document.getElementById('notvalid').innerHTML = "Maximum seat select 8";
                        return;
                    }
                } else {
                    $(this).toggleClass('selected');

                    if (selectedSeats.includes(seat)) {
                        selectedSeats = selectedSeats.filter(function(value) {
                            return value !== seat;
                        });
                        selectedPrice -= showPrice;
                    } else {
                        selectedSeats.push(seat);
                        selectedPrice += showPrice;
                    }

                    let $sLength = selectedSeats.length;

                    $('#selected-count').text($sLength);
                    $('#count').val($sLength);
                    $('#selected-seats').val(selectedSeats.join(","));

                    $('input[name="total_price"]').val(selectedPrice.toFixed(2));
                }

                $('#selected-price').text(selectedPrice.toFixed(2));
            });
        });
    </script>

    <script src="{{ asset('template/app/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('template/app/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/app/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('template/app/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('template/app/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('template/app/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('template/app/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('template/app/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('template/app/js/main.js') }}"></script>

</body>

</html>
