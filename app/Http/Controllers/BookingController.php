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
        $bookings = Booking::with('user', 'showtime')->get();
        return view('admin.bookings.index', compact('bookings'))
            ->with('title', 'Bookings');
    }

    public function create()
    {
        $users = User::all();
        $showtimes = Showtime::all();
        return view('admin.bookings.create', compact('users', 'showtimes'))
            ->with('title', 'Create Booking');
    }

    public function store(Request $request)
    {

        $showtime = Showtime::find($request->showtime_id);
        $totalPrice = $showtime->price * $request->total_seats;

        Booking::create([
            'user_id' => $request->user_id,
            'seats' => $request->seats,
            'total_seats' => $request->total_seats,
            'booking_date' => date('Y-m-d'),
            'showtime_id' => $request->showtime_id,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('admin.bookings.index')->with('success', 'Booking created successfully!');
    }

    public function show(Booking $booking)
    {
        $booking->load('user', 'showtime'); // Eager load user and showtime data
        return view('admin.bookings.show', compact('booking'))
            ->with('title', 'Booking Details');
    }

    public function edit(Booking $booking)
    {
        $booking->load('user', 'showtime'); // Eager load user and showtime data
        $users = User::all();
        $showtimes = Showtime::all();
        return view('admin.bookings.edit', compact('booking', 'users', 'showtimes'))
            ->with('title', 'Edit Booking');
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

        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully!');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully!');
    }
}
