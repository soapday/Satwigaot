<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\OpenTripController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\TripController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\TripBookingsController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==================================================
// RUTE PUBLIK (Bisa diakses semua orang)
// ==================================================
Route::get('/', function () {
    return view('beranda', [
        'upcomingTrips' => []
    ]);
})->name('home');

Route::get('/opentrip', [OpenTripController::class, 'index'])->name('opentrip.index');
Route::get('/opentrip/{trip:slug}', [OpenTripController::class, 'show'])->name('opentrip.detail');

Route::view('/privatetrip', 'privatetrip')->name('privatetrip');
Route::view('/customprivatetrip', 'customprivatetrip')->name('customprivatetrip');
Route::view('/sewaporter', 'sewaporter')->name('sewaporter');
Route::view('/paduantrip', 'paduantrip')->name('paduantrip');
Route::view('/edukasi', 'edukasi')->name('edukasi');
Route::view('/cerita', 'cerita')->name('cerita');


// ==================================================
// RUTE AUTENTIKASI (Login, Register)
// ==================================================
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});


// ==================================================
// RUTE UNTUK PENGGUNA YANG SUDAH LOGIN
// ==================================================
Route::middleware('auth')->group(function () {
    Route::post('logout', [LogoutController::class, 'destroy'])->name('logout');

    // Riwayat pesanan pengguna
    Route::get('/pemesanan', [PemesananController::class, 'show'])->name('pemesanan.show');
    Route::get('/bookings/{booking}', [PemesananController::class, 'detail'])->name('bookings.show');

    // Proses Checkout & Pembayaran
    Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::post('/proses-pembayaran', [PaymentController::class, 'processPayment'])->name('payment.process');

    // Rute Invoice dengan Parameter Booking ID
    Route::get('/invoice/{booking}', function (\App\Models\Booking $booking) {
        // Pastikan user hanya bisa melihat invoice miliknya sendiri
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Akses ditolak.');
        }
        return view('invoice', compact('booking'));
    })->name('invoice');

    // Rute status pembayaran lanjutan
    Route::get('/pembayaran/sukses/{booking}', [PaymentController::class, 'showInvoice'])->name('payment.invoice');
    Route::delete('/pembayaran/batal/{booking}', [PaymentController::class, 'cancelPayment'])->name('payment.cancel');
    Route::get('/pembayaran/instruksi/{booking}', [PaymentController::class, 'showInstruction'])->name('payment.instruction');

    // Rute default setelah login
    Route::get('dashboard', function () {
        return redirect()->route('home');
    })->name('dashboard');
});


// ==================================================
// RUTE ADMIN (Hanya bisa diakses oleh Admin)
// ==================================================
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    // Admin Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Rute untuk mengelola trips (CRUD)
    Route::resource('trips', TripController::class);

    // Kelola Bookings/Pesanan
    Route::get('/trips/{trip}/bookings', [TripBookingsController::class, 'index'])->name('trips.bookings.index');
    Route::patch('/bookings/{booking}/confirm', [TripBookingsController::class, 'confirm'])->name('bookings.confirm');
});
