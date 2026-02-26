<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking; // <-- Pastikan ini ditambahkan

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        $request->validate([
            'trip_id'             => 'required|exists:trips,id',
            'total_amount'        => 'required|numeric',
            'participant_count'   => 'required|integer',
            'participant_details' => 'required|json',
            'payment_method'      => 'required|string',
        ]);

        $bookingCode = 'INV-' . strtoupper(Str::random(8));

        // SIMPAN KE DATABASE SECARA PERMANEN!
        $booking = Booking::create([
            'user_id'             => Auth::id(), // Ambil ID user yang login
            'trip_id'             => $request->trip_id,
            'booking_code'        => $bookingCode,
            'total_participants'  => $request->participant_count,
            'total_amount'        => $request->total_amount,
            'participant_details' => json_decode($request->participant_details, true),
            'payment_method'      => $request->payment_method,
            'status'              => 'Menunggu Pembayaran'
        ]);

        $trip = \App\Models\Trip::find($request->trip_id);
        $trip->booked = $trip->booked + $request->participant_count;
        $trip->save();

        // Lempar ID Booking ke rute invoice
        return redirect()->route('invoice', $booking->id);
    }
}
