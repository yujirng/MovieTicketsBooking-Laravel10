@extends('layouts.admin.app')

@section('content')
    {{-- <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary mb-3">Create Booking</a> --}}

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Seats</th>
                <th>Total Seats</th>
                <th>Booking Date</th>
                <th>Showtime</th>
                <th>Total Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->seats }}</td>
                    <td>{{ $booking->total_seats }}</td>
                    {{-- <td>{{ $booking->booking_date->format('Y-m-d') }}</td> --}}
                    <td>{{ FunctionHelper::convertDate($booking->booking_date) }}</td>
                    <td>{{ FunctionHelper::formatFullDateTime($booking->showtime->showtime) }}</td>
                    <td>{{ (int) $booking->total_price }}đ</td>
                    <td>
                        <a href="{{ route('admin.bookings.show', $booking) }}" class="btn btn-sm btn-info">View</a>
                        {{-- <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.bookings.destroy', $booking) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
