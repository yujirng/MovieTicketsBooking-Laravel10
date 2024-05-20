@extends('layouts.app.booking.booking-layout')
@section('style')
    <style>
        td {
            width: 220px;
        }
    </style>
@endsection
@section('main')
    <div class="row border border-dark shadow-sm">
        <div class="col-lg-7 border seat-layout">
            <div class="col-lg-12 mx-auto">
                <div class="card bill-card">

                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-left">Booking Details</h2>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 text-dark">
                                <p>Your Name: {{ $bookingData['user']->name }}</p>
                                <p>Phone number: {{ $bookingData['user']->phone }}</p>
                                <p>Email: {{ $bookingData['user']->email }}</p>
                                <hr>
                                <p>Booking Date: {{ date('l, d-m-Y', strtotime('today')) }}</p>
                                <p>Total Price: {{ $bookingData['totalPrice'] }} đ</p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                            <div class="col-12">
                                <h1>Thanh toán</h1>
                            </div>
                        </div> --}}

                    {{-- <div class="row">
                            <div class="col-12">
                                <h2>Khuyến mãi</h2>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Mã khuyến mãi">
                                    <button class="btn btn-primary" type="button">Áp dụng</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h2>Khuyến mãi của bạn</h2>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                Áp dụng điểm Stars
                                            </div>
                                            <div class="col-6 text-end">
                                                100 Stars
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-left">Payment Method</h2>

                            <form action="{{ route('payment.process') }}" method="POST">
                                @csrf
                                <div class="d-flex align-items-center px-5 my-2">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="vnpay"
                                        value="vnpay" checked>
                                    <label class="form-check-label text-dark" for="vnpay">
                                        <img src="{{ asset('template/app/images/icon/vnpay-icon.png') }}" alt="VNPAY"
                                            class="img-fluid" width="50" height="50">
                                        <span class="ml-2">VNPAY</span>
                                    </label>
                                </div>
                                <div class="d-flex align-items-center px-5 my-2">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="momo"
                                        value="momo">
                                    <label class="form-check-label text-dark" for="momo">
                                        <img src="{{ asset('template/app/images/icon/momo-icon.png') }}" alt="MoMo"
                                            class="img-fluid" width="50" height="50">
                                        <span class="ml-2">MoMo E-Wallet</span>
                                    </label>
                                </div>
                                <div class="w-100 p-1 d-flex justify-content-center align-items-center">
                                    <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm">
                                        Payment
                                    </button>
                                </div>
                                <input type="hidden" name="showtimeId" value="{{ $bookingData['showtimeId'] }}">
                                <input type="hidden" name="userId" value="{{ $bookingData['user']->id }}">
                                <input type="hidden" name="seats" value="{{ $bookingData['selectedSeats'] }}">
                                <input type="hidden" name="total-seats" value="{{ $bookingData['totalSeats'] }}">
                                <input type="hidden" name="total-price" value="{{ $bookingData['totalPrice'] }}">
                                <input type="hidden" name="booking-date" value="{{ date('Y-m-d', strtotime('today')) }}">
                            </form>
                        </div>
                    </div>
                    {{-- <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <form action="{{ route('payment.vnpay') }}" method="POST">
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
                        </div> --}}
                </div>
            </div>




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
                    <td class="pt-3">
                        <font size="4px" style="font-weight: bold; color:black">Seats:</font>
                        <font size=3 style="color:black">{{ $bookingData['selectedSeats'] }}</font>
                    </td>
                    <td class="pt-3">
                        <font size="4px" style="font-weight: bold; color:black">- Total Seats:</font>
                        <font size=3 style="color:black">
                            {{ $bookingData['totalSeats'] }}</font>
                    </td>
                </tr>
            </table>

            <!-- check login -->
            {{-- @if (!isset($_SESSION['username'])) --}}
            {{-- @if (!Auth::check())
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
                @endif --}}
        </div>
    </div>
@endsection
