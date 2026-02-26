<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        // 1. Validasi data yang dikirim dari form sebelumnya
        $request->validate([
            'trip_id'            => 'required|exists:trips,id',
            'total_participants' => 'required|integer|min:1',
            'total_amount'       => 'required|numeric',
            'participants'       => 'required|array',
        ]);

        // 2. Ambil data Trip dari database berdasarkan trip_id
        $trip = Trip::findOrFail($request->trip_id);

        // 3. Siapkan data yang dibutuhkan oleh checkout.blade.php
        $total_amount = $request->total_amount;
        $total_participants = $request->total_participants;
        $participants_details = $request->participants;

        // 4. Lempar datanya ke halaman checkout kamu!
        return view('checkout', compact(
            'trip',
            'total_amount',
            'total_participants',
            'participants_details'
        ));
    }
}
