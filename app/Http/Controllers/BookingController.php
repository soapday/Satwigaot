<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Trip;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $trip = Trip::findOrFail($request->trip_id);

        $total = $trip->price * $request->quantity;

        Booking::create([
            'trip_id' => $trip->id,
            'name' => $request->name,
            'email' => $request->email,
            'quantity' => $request->quantity,
            'total_price' => $total,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Booking berhasil');
    }
}