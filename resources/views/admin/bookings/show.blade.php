@extends('layouts.admin.app')

@section('content')
    <h1>Booking Details</h1>

    <div class="card">
        <div class="card-body">
            <p><b>User:</b> {{ $booking->user->name }}</p>
            <p><b>Seats:</b> {{ $booking->seats }}</p>
            <p><b>Total Seats:</b> {{ $booking->total_seats }}</p>
            <p><b>Booking Date:</b> {{ $booking->booking_date->format('Y-m-d') }}</p>
            <p><b>Showtime:</b> {{ $booking->showtime->title }}</p>
            <p><b>Total Price:</b> {{ $booking->total_price }}</p>
        </div>
    </div>

    <a href="{{ route('bookings.index') }}" class="btn btn-primary">Back to List</a>
    <a href="{{ route('bookings.edit', $booking) }}" class="btn btn-warning">Edit</a>
@endsection
