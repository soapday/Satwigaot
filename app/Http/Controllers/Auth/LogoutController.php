<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Wajib ditambahkan untuk memanggil fungsi Auth

class LogoutController extends Controller
{
    public function destroy(Request $request)
    {
        // 1. Keluarkan pengguna yang sedang login
        Auth::logout();

        // 2. Hapus (invalidate) sesi saat ini agar tidak bisa dipakai lagi
        $request->session()->invalidate();

        // 3. Buat ulang token CSRF untuk mencegah serangan keamanan (Cross-Site Request Forgery)
        $request->session()->regenerateToken();

        // 4. Arahkan pengguna kembali ke halaman beranda setelah berhasil logout
        return redirect('/');
    }
}
