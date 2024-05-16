@extends('layouts.admin.app')

@section('content')
    <h1>Create Booking</h1>

    <form action="{{ route('admin.bookings.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="user_id">User:</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="seats">Seats:</label>
            <input type="text" name="seats" id="seats" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="total_seats">Total Seats:</label>
            <input type="number" name="total_seats" id="total_seats" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="booking_date">Booking Date:</label>
            <input type="date" name="booking_date" id="booking_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="showtime_id">Showtime:</label>
            <select name="showtime_id" id="showtime_id" class="form-control">
                @foreach ($showtimes as $showtime)
                    <option value="{{ $showtime->id }}">{{ $showtime->showtime }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Booking</button>
    </form>
@endsection
