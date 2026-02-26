<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking; // Panggil model Booking
use App\Models\Trip;    // Panggil model Trip
use App\Models\User;    // Panggil model User

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total pendapatan (misal dari pesanan yang tidak batal)
        $totalRevenue = Booking::where('status', '!=', 'Batal')->sum('total_amount');

        // Hitung jumlah trip yang akan datang
        $upcomingTripsCount = Trip::where('start_date', '>=', now())->count();

        // Hitung jumlah pesanan baru (30 hari terakhir)
        $newBookingsCount = Booking::where('created_at', '>=', now()->subDays(30))->count();

        // Hitung total pelanggan (user biasa, bukan admin)
        $totalUsers = User::where('role', '!=', 'admin')->count();

        // Ambil 5 data pesanan terakhir untuk tabel Recent Bookings
        $recentBookings = Booking::with(['user', 'trip'])->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalRevenue',
            'upcomingTripsCount',
            'newBookingsCount',
            'totalUsers',
            'recentBookings'
        ));
    }
}
