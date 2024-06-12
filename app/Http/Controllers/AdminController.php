<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.auth.login');
    }

    public function dashboard()
    {
        $currentYear = Carbon::now()->year;

        $revenueByMonth = Booking::select(DB::raw('MONTH(booking_date) as month'), DB::raw('SUM(total_price) as total_revenue'))
            ->whereYear('booking_date', $currentYear)
            ->groupBy(DB::raw('MONTH(booking_date)'))
            ->orderBy('month')
            ->get();

        $monthlyRevenue = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthlyRevenue[$i] = 0;
        }

        foreach ($revenueByMonth as $revenue) {
            $monthlyRevenue[$revenue->month] = $revenue->total_revenue;
        }

        $years = range($currentYear - 2, $currentYear);

        $revenueByQuarter = [];
        foreach ($years as $year) {
            for ($quarter = 1; $quarter <= 4; $quarter++) {
                $startMonth = ($quarter - 1) * 3 + 1;
                $endMonth = $quarter * 3;

                $revenue = Booking::whereYear('booking_date', $year)
                    ->whereMonth('booking_date', '>=', $startMonth)
                    ->whereMonth('booking_date', '<=', $endMonth)
                    ->sum('total_price');

                $revenueByQuarter[] = $revenue;
            }
        }

        $quarterLabels = [];
        foreach ($years as $year) {
            for ($quarter = 1; $quarter <= 4; $quarter++) {
                $quarterLabels[] = "Q{$quarter} {$year}";
            }
        }

        $bookingsCount = Booking::count();
        $usersCount = User::whereNotIn('role', [1])->count();
        $title = "Dashboard";

        $totalRegisteredUsers = User::whereIn(DB::raw('YEAR(created_at)'), $years)->count();

        $totalBookings = Booking::whereIn(DB::raw('YEAR(booking_date)'), $years)->count();

        return view(
            'admin.admin.dashboard',
            compact(
                'title',
                'bookingsCount',
                'usersCount',
                'revenueByMonth',
                'monthlyRevenue',
                'quarterLabels',
                'revenueByQuarter',
                'totalBookings',
                'totalRegisteredUsers'
            )
        );
    }

    public function statistical(Request $request)
    {
        $title = "Statistical";
        $startMonth = $request->input('start_month') ?? 1;
        $endMonth = $request->input('end_month') ?? 12;
        $year = $request->input('year') ?? Carbon::now()->year;

        $monthsInRange = range($startMonth, $endMonth);

        $revenueByMonthQuery = Booking::select(DB::raw('MONTH(booking_date) as month'), DB::raw('IFNULL(SUM(total_price), 0) as total_revenue'))
            ->whereMonth('booking_date', '>=', $startMonth)
            ->whereMonth('booking_date', '<=', $endMonth)
            ->whereYear('booking_date', $year)
            ->groupBy(DB::raw('MONTH(booking_date)'))
            ->orderBy('month')
            ->pluck('total_revenue', 'month')
            ->toArray();

        $revenueByMonth = [];

        foreach ($monthsInRange as $month) {
            if (array_key_exists($month, $revenueByMonthQuery)) {
                $revenueByMonth[$month] = $revenueByMonthQuery[$month];
            } else {
                $revenueByMonth[$month] = 0;
            }
        }

        $months = [
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
            5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
            9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
        ];

        $monthNames = array_map(fn ($month) => $months[$month], array_keys($revenueByMonth));

        // dd($revenueByMonth);

        return view('admin.admin.statistical', compact('title', 'revenueByMonth', 'monthNames', 'year'));
    }

    public function slider()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $userRole = Auth::user()->role;

            if ($userRole === 1) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('app.index');
            }
        }
        return redirect()->back()->with('error', 'Không thể đăng nhập!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request,)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
