<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ShowTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    //
    public function feedback()
    {
        return view('app.feedback');
    }

    public function contacts()
    {
        return view('app.contacts');
    }

    public function about()
    {
        return view('app.about');
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
                ->first();

            if (!$showtimeInfo) {
                return redirect()->route('index');
            }

            $movieTitle = $showtimeInfo->title;
            $movieImage = $showtimeInfo->image;
            $showDate = $showtimeInfo->show_date;
            $showTime = $showtimeInfo->show_time;
            $showPrice = $showtimeInfo->price;

            return view('app.booking.seatbooking', [
                'movieTitle' => $movieTitle,
                'movieImage' => $movieImage,
                'showDate' => $showDate,
                'showTime' => $showTime,
                'showPrice' => $showPrice,
                'showtimeId' => $showtimeId,
                'occupiedSeats' => $occupiedSeats,
            ]);
        } else {
            return redirect()->route('index');
        }
    }

    public function showBookingSummary(Request $request)
    {
        // Lấy dữ liệu từ request
        $showtimeId = $request->input('showtimeId');
        $selectedSeats = $request->input('selected-seats');
        $totalSeats = $request->input('total-seats');
        $totalPrice = $request->input('total_price');

        // Lấy thông tin về suất chiếu, phim và người dùng
        $bookingInfo = Showtime::where('id', $showtimeId)
            ->with('movie', 'theater', 'screen')
            ->firstOrFail();

        $showtimeString = $bookingInfo->showtime; // Lấy giá trị dạng chuỗi
        $showtimeDateTime = date_create($showtimeString); // Chuyển đổi chuỗi thành đối tượng DateTime

        // Kiểm tra nếu chuyển đổi thành công
        if ($showtimeDateTime !== false) {
            $showDate = date_format($showtimeDateTime, 'd/m/Y'); // Lấy ngày
            $showTime = date_format($showtimeDateTime, 'H:i'); // Lấy giờ
        } else {
            // Xử lý khi chuyển đổi không thành công
            $showDate = null;
            $showTime = null;
        }

        // Lấy thông tin người dùng từ session hoặc cơ sở dữ liệu
        // Giả sử thông tin người dùng được lưu trong bảng users
        // và bạn đã thiết lập middleware xác thực cho các route cần thiết

        // $user = auth()->user(); // Lấy thông tin người dùng hiện tại đăng nhập
        // hoặc
        $user = User::where('username', Auth::user()->id)->first();

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
        // Lấy thông tin cần thiết từ request
        $showtimeId = $request->input('showtimeId');
        $userId = $request->input('userId');
        $seats = $request->input('seats');
        $totalSeats = $request->input('total-seats');
        $totalPrice = $request->input('total-price');
        $bookingDate = $request->input('booking-date');

        // Tạo bản ghi booking mới trong cơ sở dữ liệu
        $booking = new Booking();
        $booking->user_id = $userId;
        $booking->seats = $seats;
        $booking->total_seats = $totalSeats;
        $booking->booking_date = $bookingDate;
        $booking->showtime_id = $showtimeId;
        $booking->total_price = $totalPrice;
        $booking->save(); // Lưu bản ghi vào cơ sở dữ liệu

        // Lấy booking ID vừa được tạo
        $bookingId = $booking->id;

        // // Lưu booking ID vào session
        // $request->session()->put('booking_id', $bookingId);

        $bookingInfo = Booking::where('id', $bookingId)
            ->where('id', $bookingId)
            ->with('showtime.movie', 'showtime.theater', 'showtime.screen', 'user')
            ->first();

        // Hiển thị view payment_form và truyền các thông tin cần thiết
        return view('app.booking.ticketshow', [
            'bookingInfo' => $bookingInfo
        ]);
    }

    public function showUserInformation()
    {
        $user = Auth::user();
        return view('app.user.information', compact('user'));
    }

    public function updateUserInformation(Request $request)
    {
        $user = Auth::user();

        // Cập nhật thông tin người dùng

        return redirect()->back()->with('success', 'User information updated successfully.');
    }

    public function changePassword(Request $request)
    {
        // Xử lý thay đổi mật khẩu
    }

    public function bookingHistory(Request $request)
    {
        $user = Auth::user();

        $bookingList = Booking::where('user_id', $user->id)
            ->with('showtime.movie', 'showtime.theater', 'showtime.screen', 'user')
            ->get();

        return view('app.user.bookinghistory', compact('bookingList', 'user'));
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
