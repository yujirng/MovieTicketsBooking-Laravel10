<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Showtime;
use App\Models\Payment;
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

    public function createPayment(Request $request)
    {
        $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $request->amount; // Số tiền thanh toán
        $vnp_Locale = $request->language; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = $request->bank_code; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => env('VNP_TMN_CODE'),
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => route('vnpay.return'),
            "vnp_TxnRef" => $vnp_TxnRef,
            // "vnp_ExpireDate" => $expire
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env('VNP_URL') . "?" . $query;
        if (env('VNP_HASH_SECRET')) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, env('VNP_HASH_SECRET')); //
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        };
        return redirect($vnp_Url);
    }

    public function vnpayReturn(Request $request)
    {
        $vnpayData = $request->all();
        $bookingInfo = session()->get('info_booking');

        // dd($bookingInfo);

        $dataPayment = [
            'p_transaction_id' => $vnpayData['vnp_TxnRef'],
            'p_user_id' => $bookingInfo['userId'],
            'p_money' => $bookingInfo['total-price'],
            'p_note' => $vnpayData['vnp_OrderInfo'],
            'p_vnp_response_code' => $vnpayData['vnp_ResponseCode'],
            'p_code_vnpay' => $vnpayData['vnp_TransactionNo'],
            'p_code_bank' => $vnpayData['vnp_BankCode'],
            'p_time' => date('Y-m-d H:i', strtotime($vnpayData['vnp_PayDate'])),
        ];

        $insertedPayment = Payment::create($dataPayment);
        $paymentId = $insertedPayment->id;

        $showtimeId = $bookingInfo['showtimeId'];
        $userId = $bookingInfo['userId'];
        $seats = $bookingInfo['seats'];
        $totalSeats = $bookingInfo['total-seats'];
        $totalPrice = $bookingInfo['total-price'];
        $bookingDate = $bookingInfo['booking-date'];

        $booking = new Booking();
        $booking->user_id = $userId;
        $booking->seats = $seats;
        $booking->total_seats = $totalSeats;
        $booking->booking_date = $bookingDate;
        $booking->showtime_id = $showtimeId;
        $booking->total_price = $totalPrice;
        $booking->payment_id = $paymentId;
        $booking->save();

        $bookingId = $booking->id;

        //     "vnp_Amount" => "2000000"
        //     "vnp_BankCode" => "NCB"
        //     "vnp_BankTranNo" => "VNP14419164"
        //     "vnp_CardType" => "ATM"
        //     "vnp_OrderInfo" => "Thanh toan GD:1649"
        //     "vnp_PayDate" => "20240517233557"
        //     "vnp_ResponseCode" => "00"
        //     "vnp_TmnCode" => "00BNZ6U3"
        //     "vnp_TransactionNo" => "14419164"
        //     "vnp_TransactionStatus" => "00"
        //     "vnp_TxnRef" => "1649"
        //     "vnp_SecureHash" => "464010a4727fe6bf6f6e4e47c9410c93356016b6d03e70bb870ddada764bd64d3f1363a643670dd91efacc73f82ce82b30753546101310c64333ba47236b9cfd"

        $dataPayment = [
            'p_transaction_id' => $vnpayData['vnp_TxnRef'],
            'p_user_id' => $bookingInfo['userId'],
            'p_money' => $bookingInfo['total-price'],
            'p_note' => $vnpayData['vnp_OrderInfo'],
            'p_vnp_response_code' => $vnpayData['vnp_ResponseCode'],
            'p_code_vnpay' => $vnpayData['vnp_TransactionNo'],
            'p_code_bank' => $vnpayData['vnp_BankCode'],
            'p_time' => date('Y-m-d H:i', strtotime($vnpayData['vnp_PayDate'])),
        ];

        Payment::insert($dataPayment);

        $vnp_SecureHash = $vnpayData['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, env('VNP_HASH_SECRET'));

        $secureBool = ($secureHash == $vnp_SecureHash) ? true : false;

        return view('app.vnpay.return', compact('vnpayData', 'secureHash', 'secureBool', 'bookingId'));
    }
}
