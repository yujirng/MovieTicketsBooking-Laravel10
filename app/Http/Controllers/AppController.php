<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ShowTime;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AppController extends Controller
{
    //
    public function feedback()
    {
        $genres = Genre::pluck('genre_name');
        return view('app.feedback', compact('genres'));
    }

    public function contacts()
    {
        $genres = Genre::pluck('genre_name');
        return view('app.contacts', compact('genres'));
    }

    public function about()
    {
        $genres = Genre::pluck('genre_name');
        return view('app.about', compact('genres'));
    }

    // public function seatbooking(Request $request)
    // {
    //     $movieId = $request->input('movieId');
    //     $showtimeId = $request->input('showtimeId');

    //     return view('app.bookings.seatbooking', compact('movieId', 'showtimeId'));
    // }


    public function seatbooking(Request $request)
    {
        if ($request->has('showtimeId') && $request->has('movieId')) {
            $showtimeId = $request->input('showtimeId');
            $movieId = $request->input('movieId');
            $date = now()->format('Y-m-d');

            $occupiedSeats = Booking::where('showtime_id', $showtimeId)
                ->where('booking_date', $date)
                ->pluck('seats')
                ->flatMap(fn ($seats) => explode(',', $seats))
                ->toArray();

            $showtimeInfo = ShowTime::select('movies.title', 'movies.image', 'showtimes.price', DB::raw('DATE_FORMAT(showtimes.showtime, "%Y-%m-%d") AS show_date'), DB::raw('DATE_FORMAT(showtimes.showtime, "%H:%i") AS show_time'))
                ->join('movies', 'showtimes.movie_id', '=', 'movies.id')
                ->where('showtimes.id', $showtimeId)
                ->with('rooms.screen_name')
                ->first();

            if (!$showtimeInfo) {
                return redirect()->route('index');
            }

            $movieTitle = $showtimeInfo->title;
            $movieImage = $showtimeInfo->image;
            $showDate = $showtimeInfo->show_date;
            $showTime = $showtimeInfo->show_time;
            $showPrice = $showtimeInfo->price;
            $screen_name = $showtimeInfo->screen_name;

            return view('app.booking.seatbooking', [
                'movieTitle' => $movieTitle,
                'movieImage' => $movieImage,
                'showDate' => $showDate,
                'showTime' => $showTime,
                'showPrice' => $showPrice,
                'showtimeId' => $showtimeId,
                'occupiedSeats' => $occupiedSeats,
                'screen_name' => $screen_name
            ]);
        } else {
            return redirect()->route('index');
        }
    }

    public function showBookingSummary(Request $request)
    {
        $showtimeId = $request->input('showtimeId');
        $selectedSeats = $request->input('selected-seats');
        $totalSeats = $request->input('total-seats');
        $totalPrice = $request->input('total_price');

        $bookingInfo = Showtime::where('id', $showtimeId)
            // ->with('movie', 'theater', 'screen')
            ->with('movie', 'theater', 'room')
            ->firstOrFail();

        $showtimeString = $bookingInfo->showtime;
        $showtimeDateTime = date_create($showtimeString);

        if ($showtimeDateTime !== false) {
            $showDate = date_format($showtimeDateTime, 'd/m/Y');
            $showTime = date_format($showtimeDateTime, 'H:i');
        } else {
            $showDate = null;
            $showTime = null;
        }

        $user = User::where('id', Auth::user()->id)->first();

        return view('app.booking.summary', [
            'showtimeId' => $showtimeId,
            'bookingInfo' => $bookingInfo,
            'selectedSeats' => $selectedSeats,
            'totalSeats' => $totalSeats,
            'totalPrice' => $totalPrice,
            'showDate' => $showDate,
            'showTime' => $showTime,
            'user' => $user,
        ]);
    }

    public function paymentForm(Request $request)
    {

        $showtimeId = $request->input('showtimeId');
        $userId = $request->input('userId');
        $seats = $request->input('seats');
        $totalSeats = $request->input('total-seats');
        $totalPrice = $request->input('total-price');
        $bookingDate = $request->input('booking-date');

        $booking = new Booking();
        $booking->user_id = $userId;
        $booking->seats = $seats;
        $booking->total_seats = $totalSeats;
        $booking->booking_date = $bookingDate;
        $booking->showtime_id = $showtimeId;
        $booking->total_price = $totalPrice;
        $booking->save();

        $bookingId = $booking->id;

        $bookingInfo = Booking::where('id', $bookingId)
            ->with('showtime.movie', 'showtime.theater', 'showtime.screen', 'user')
            ->first();

        return view('app.booking.ticketshow', [
            'bookingInfo' => $bookingInfo
        ]);
    }

    public function showTicket(Request $request)
    {
        $bookingInfo = Booking::where('id', $request->bookingId)
            ->with('showtime.movie', 'showtime.theater', 'showtime.screen', 'user')
            ->first();

        return view('app.booking.ticketshow', [
            'bookingInfo' => $bookingInfo
        ]);
    }

    public function showUserInformation()
    {
        $user = Auth::user();
        $genres = Genre::pluck('genre_name');
        return view('app.user.information', compact('user', 'genres'));
    }

    public function updateUserInformation(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'required|string|max:15',
            'gender' => 'required|in:0,1',
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        $user->update([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
        ]);

        return redirect()->back()->with('success', 'User information updated successfully.');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:6',
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        if (!Hash::check($request->currentPassword, $user->password)) {
            return redirect()->back()->withErrors(['new_password' => 'Mật khẩu hiện tại không đúng']);
        }

        $user->update([
            'password' => Hash::make($request->newPassword),
        ]);

        return redirect()->back()->with('success', 'Mật khẩu đã được thay đổi thành công!');
    }

    public function bookingHistory(Request $request)
    {
        $user = Auth::user();
        $genres = Genre::pluck('genre_name');

        $bookingList = Booking::where('user_id', $user->id)
            ->with('showtime.movie', 'showtime.theater', 'showtime.screen', 'user')
            ->get();

        return view('app.user.bookinghistory', compact('bookingList', 'user', 'genres'));
    }

    public function showUserNotifications()
    {
        $user = Auth::user();
        return view('app.user.notifications', compact('user'));
    }

    public function showUserGifts()
    {
        $user = Auth::user();
        return view('app.user.gifts', compact('user'));
    }
}
