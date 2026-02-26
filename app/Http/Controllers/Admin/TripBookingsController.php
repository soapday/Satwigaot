<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class TripBookingsController extends Controller
{
    // Fungsi untuk menampilkan semua pesanan (jika diperlukan)
    public function index()
    {
        $bookings = Booking::with(['user', 'trip'])->latest()->paginate(10);
        return view('admin.bookings.index', compact('bookings'));
    }

    // FUNGSI UNTUK KONFIRMASI PEMBAYARAN
    public function confirm(Booking $booking)
    {
        $booking->update([
            'status' => 'Lunas' // Mengubah status dari 'Menunggu Pembayaran' menjadi 'Lunas'
        ]);

        return back()->with('success', 'Pembayaran berhasil dikonfirmasi!');
    }
}
