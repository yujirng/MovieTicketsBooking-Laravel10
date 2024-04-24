<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Showtime;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::with('user', 'showtime')->get(); // Eager load user and showtime data
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $users = User::all();
        $showtimes = Showtime::all();
        return view('bookings.create', compact('users', 'showtimes'));
    }

    public function store(Request $request)
    {

        $showtime = Showtime::find($request->showtime_id);
        $totalPrice = $showtime->price * $request->total_seats;

        $booking = Booking::create([
            'user_id' => $request->user_id,
            'seats' => $request->seats,
            'total_seats' => $request->total_seats,
            'booking_date' => date('Y-m-d'),
            'showtime_id' => $request->showtime_id,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully!');
    }

    public function show(Booking $booking)
    {
        $booking->load('user', 'showtime'); // Eager load user and showtime data
        return view('bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $booking->load('user', 'showtime'); // Eager load user and showtime data
        $users = User::all();
        $showtimes = Showtime::all();
        return view('bookings.edit', compact('booking', 'users', 'showtimes'));
    }


    public function update(Request $request, Booking $booking)
    {
        $showtime = Showtime::find($request->showtime_id);
        $totalPrice = $showtime->price * $request->total_seats;

        $booking->update([
            'user_id' => $request->user_id,
            'seats' => $request->seats,
            'total_seats' => $request->total_seats,
            'booking_date' => $request->booking_date, // Update booking date if provided
            'showtime_id' => $request->showtime_id,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully!');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully!');
    }
}
