<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; // Penting: Import model User
use Illuminate\Http\Request; // Penting: Import Request
use Illuminate\Support\Facades\Hash; // Penting: Import Hash untuk enkripsi password
use Illuminate\Support\Facades\Auth; // Penting: Import Auth untuk login otomatis

class RegisterController extends Controller
{
    // Fungsi create() kamu mungkin sudah ada di sini untuk menampilkan form
    public function create()
    {
        return view('auth.register');
    }

    // Tambahkan fungsi store() ini untuk memproses data:
    public function store(Request $request)
    {
        // 1. Validasi input dari form
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // Catatan: 'confirmed' butuh input bernama 'password_confirmation' di form HTML kamu
        ]);

        // 2. Simpan data user baru ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
        ]);

        // 3. (Opsional) Langsung login-kan user setelah berhasil register
        Auth::login($user);

        // 4. Arahkan ke halaman beranda atau dashboard setelah sukses
        return redirect()->route('dashboard'); // Sesuaikan dengan rute tujuanmu
    }
}
