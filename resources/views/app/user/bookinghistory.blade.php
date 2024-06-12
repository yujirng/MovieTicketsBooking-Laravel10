@extends('layouts.app.user.user-layout')
@section('section')
    <div class="row">
        <div class="col-11">
            <div class="card border-0 shadow-lg mb-4 rounded-0">
                <div class="card-body">
                    <h4 class="mb-4">Booking History</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Showtime</th>
                                    <th>Booking Date</th>
                                    <th>Seats</th>
                                    <th>Total Seats</th>
                                    <th>Title</th>
                                    <th>Theater</th>
                                    <th>Total Price</th>
                                    <th>Screen Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bookingList as $booking)
                                    <tr>
                                        <td>{{ $booking->showtime->showtime }}</td>
                                        <td>{{ $booking->booking_date }}</td>
                                        <td>{{ $booking->seats }}</td>
                                        <td>{{ $booking->total_seats }}</td>
                                        <td>{{ $booking->showtime->movie->title }}</td>
                                        <td>{{ $booking->showtime->room->theater->theater_name }}</td>
                                        <td>{{ (int) $booking->total_price }}đ</td>
                                        <td>{{ $booking->showtime->room->screen_name }}</td>
                                        <td>
                                            <form action="{{ route('showticket', ['bookingId' => $booking->id]) }}"
                                                method="POST">
                                                @csrf
                                                <a class="btn btn-info text-white"
                                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">Ticket</a>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9">No records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
