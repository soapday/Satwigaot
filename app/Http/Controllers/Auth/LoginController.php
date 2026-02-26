<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Penting: Import Auth untuk proses login

class LoginController extends Controller
{
    // Ini fungsi create() yang sebelumnya sudah kita buat untuk menampilkan form
    public function create()
    {
        return view('auth.login');
    }

    // Tambahkan fungsi store() ini untuk memproses data login
    public function store(Request $request)
    {
        // 1. Validasi input dari form login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Coba mencocokkan kredensial dengan database (proses login)
        if (Auth::attempt($credentials)) {

            // 3. Jika berhasil, perbarui sesi untuk keamanan (mencegah Session Fixation)
            $request->session()->regenerate();

            // 4. Arahkan pengguna ke halaman dashboard atau halaman yang ingin diakses sebelumnya
            // Sesuaikan 'dashboard' dengan rute tujuan kamu
            return redirect()->intended('dashboard');
        }

        // 5. Jika email/password salah, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email'); // Menyimpan input email agar user tidak perlu mengetik ulang
    }
}
