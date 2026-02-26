<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'trip_id',
        'booking_code',
        'total_participants',
        'total_amount',
        'participant_details',
        'payment_method',
        'status'
    ];

    // Beritahu Laravel bahwa kolom ini adalah JSON Array
    protected $casts = [
        'participant_details' => 'array',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Trip
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    
}
