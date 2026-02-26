<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'route',
        'province',
        'altitude',
        'duration',
        'difficulty',
        'slot',
        'start_date',
        'end_date',
        'status',
        'price',
        'image_path'
    ];

    // Tambahkan bagian ini:
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
