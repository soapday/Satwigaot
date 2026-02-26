<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class OpenTripController extends Controller
{
    public function index()
    {
        $trips = Trip::latest()->paginate(6);
        return view('opentrip', compact('trips'));
    }

    public function show(Trip $trip)
    {
        return view('opentripdetail', compact('trip'));
    }
}
