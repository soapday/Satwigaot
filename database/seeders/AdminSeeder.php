<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan Model User dipanggil
use Illuminate\Support\Facades\Hash; // Untuk enkripsi password

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('sabda123'),
            'role' => 'admin',
        ]);
    }
}
