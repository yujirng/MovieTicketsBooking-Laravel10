@extends('layouts.app.booking.booking-layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('template/app/css/seatbooking.css') }}">

    <style>
        .text {
            color: black;
        }

        .screen {
            background-color: #64748b;
            transform: perspective(10px) rotateX(-1deg);
            width: 85%;
            box-shadow: 0 3px 12px rgba(100, 116, 139, .7);
        }

        .screen-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.5rem;
            text-shadow: 0 3px 12px rgba(255, 255, 255, .7);
        }

        .seat-label {
            width: 35px;
            height: 30px;
            margin: 5px;
            color: #000;
            font-size: 20px;
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
    </style>
@endsection

@section('main')
    <form action="{{ route('payment') }}" method="POST">
        @csrf
        <div class="row border border-dark shadow-sm">
            <div class="col-lg-7 border seat-layout">
                <div class="row flex justify-content-center">
                    <div class="screen relative">
                        <div class="screen-text">
                            <p>Screen</p>
                        </div>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-1 d-flex flex-column">
                        @foreach (range('A', 'G') as $row)
                            <div class="seat-label text-center">{{ $row }}</div>
                        @endforeach
                    </div>
                    <div class="col-10 seats-container mx-auto">
                        <div class="row d-flex justify-content-center align-items-center">
                            @foreach (['A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8'] as $seat)
                                @php
                                    $seatClass = in_array($seat, $ticketInfo['occupiedSeats']) ? 'occupied' : '';
                                @endphp
                                <div class="seat {{ $seatClass }}" data-seat="{{ $seat }}"></div>
                            @endforeach
                        </div>

                        <div class="row d-flex justify-content-center align-items-center">
                            @foreach (['B1', 'B2', 'B3', 'B4', 'B5', 'B6', 'B7', 'B8'] as $seat)
                                @php
                                    $seatClass = in_array($seat, $ticketInfo['occupiedSeats']) ? 'occupied' : '';
                                @endphp
                                <div class="seat {{ $seatClass }}" data-seat="{{ $seat }}"></div>
                            @endforeach
                        </div>

                        <div class="row d-flex justify-content-center align-items-center">
                            @foreach (['C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8'] as $seat)
                                @php
                                    $seatClass = in_array($seat, $ticketInfo['occupiedSeats']) ? 'occupied' : '';
                                @endphp
                                <div class="seat {{ $seatClass }}" data-seat="{{ $seat }}"></div>
                            @endforeach
                        </div>

                        <div class="row d-flex justify-content-center align-items-center">
                            @foreach (['D1', 'D2', 'D3', 'D4', 'D5', 'D6', 'D7', 'D8'] as $seat)
                                @php
                                    $seatClass = in_array($seat, $ticketInfo['occupiedSeats']) ? 'occupied' : '';
                                @endphp
                                <div class="seat {{ $seatClass }}" data-seat="{{ $seat }}"></div>
                            @endforeach
                        </div>

                        <div class="row d-flex justify-content-center align-items-center">
                            @foreach (['E1', 'E2', 'E3', 'E4', 'E5', 'E6', 'E7', 'E8'] as $seat)
                                @php
                                    $seatClass = in_array($seat, $ticketInfo['occupiedSeats']) ? 'occupied' : '';
                                @endphp
                                <div class="seat {{ $seatClass }}" data-seat="{{ $seat }}"></div>
                            @endforeach
                        </div>

                        <div class="row d-flex justify-content-center align-items-center">
                            @foreach (['F1', 'F2', 'F3', 'F4', 'F5', 'F6', 'F7', 'F8'] as $seat)
                                @php
                                    $seatClass = in_array($seat, $ticketInfo['occupiedSeats']) ? 'occupied' : '';
                                @endphp
                                <div class="seat {{ $seatClass }}" data-seat="{{ $seat }}"></div>
                            @endforeach
                        </div>
                        <div class="row d-flex justify-content-center align-items-center">
                            @foreach (['G1', 'G2', 'G3', 'G4', 'G5', 'G6', 'G7', 'G8'] as $seat)
                                @php
                                    $seatClass = in_array($seat, $ticketInfo['occupiedSeats']) ? 'occupied' : '';
                                @endphp
                                <div class="seat {{ $seatClass }}" data-seat="{{ $seat }}"></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-1 d-flex flex-column" style="padding-left: unset;">
                        @foreach (range('A', 'G') as $row)
                            <div class="seat-label text-center">{{ $row }}</div>
                        @endforeach
                    </div>
                </div>

                <ul class="showcase">
                    <li>
                        <div class="seat"></div>
                        <small class="text-white">Available</small>
                    </li>
                    <li>
                        <div class="seat-sample selected"></div>
                        <small class="text-white">Selected</small>
                    </li>
                    <li>
                        <div class="seat-sample occupied"></div>
                        <small class="text-white">Occupied</small>
                    </li>
                </ul>
                <p class="text text-center mt-3">You have selected <span class="highlight-text" id="selected-count">0</span>
                    seats for
                    the
                    price of <span class="highlight-text" id="selected-price">0</span>đ</p>

                <input type="hidden" name="total_price" value="">
                <input type="hidden" name="showtimeId" value="{{ $ticketInfo['showtimeId'] }}">
                <div class="hr" style="border-bottom: 3px solid #FFA500;"></div>

            </div>
            <div class="col-lg-5 pt-5 payment-layout">
                <div class="hr" style="border-bottom: 3px solid #FFA500; margin:10px"></div>
                <table>
                    <tr>
                        <td><img src="{{ Storage::url('movie_images/' . $ticketInfo['movieImage']) }}" width="200"
                                height="300">
                        </td>
                        <td>
                            <font size=5 style="color:black">{{ $ticketInfo['movieTitle'] }}</font>
                            <font size="3px" style="display: block; color:black">{{ $ticketInfo['screen_name'] }}
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td class="pt-3">
                            <font size="4px" style="font-weight: bold; color:black">Theater:</font>
                            <font size=3 style="color:black">{{ $ticketInfo['theater_name'] }}</font>
                        </td>
                        <td class="pt-3">
                            <font size="4px" style="font-weight: bold; color:black">- Room:</font>
                            <font size=3 style="color:black">
                                {{ $ticketInfo['room_name'] }}</font>
                        </td>
                    </tr>
                    <tr>
                        <td class="pt-3">
                            <font size="4px" style="font-weight: bold; color:black">Showtimes:</font>
                            <font size=3 style="color:black">{{ $ticketInfo['showTime'] }}</font>
                        </td>
                        <td class="pt-3">
                            <font size="4px" style="font-weight: bold; color:black">- </font>
                            <font size=3 style="color:black">
                                {{ FunctionHelper::convertDateWithWeekDay($ticketInfo['showDate']) }}</font>
                        </td>
                    </tr>
                    <tr>
                        <td style="color: #FFA500">------------------------------</td>
                        <td style="color: #FFA500">------------------------------</td>
                    </tr>
                    <tr>
                        <td><input type="text" id="selected-seats" name="selected-seats" placeholder="Selected Seats"
                                readonly></td>
                        <td><input type="text" id="count" name="total-seats" placeholder="Total Seats" readonly></td>
                    </tr>
                </table>

                <!-- check login -->
                {{-- @if (!isset($_SESSION['username'])) --}}
                @if (!Auth::check())
                    <div class="col-lg-12">
                        <div class="form-group">
                            <a data-toggle="modal" data-target="#need-login" class="form-control btn btn-primary py-2">
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
@endsection

@section('scripts')
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
            var showPrice = {{ $ticketInfo['showPrice'] }}
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

                    $('input[name="total_price"]').val(selectedPrice.toFixed(0));
                }

                $('#selected-price').text(selectedPrice.toFixed(0));
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
@endsection
