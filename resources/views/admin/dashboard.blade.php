@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-sm font-medium text-slate-500">Total Revenue</h3>
            <p class="text-3xl font-bold text-slate-900 mt-2">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</p>
            <p class="text-xs text-slate-400 mt-1">From successful bookings</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-sm font-medium text-slate-500">Upcoming Trips</h3>
            <p class="text-3xl font-bold text-slate-900 mt-2">{{ $upcomingTripsCount }}</p>
            <p class="text-xs text-slate-400 mt-1">Ready to go</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-sm font-medium text-slate-500">New Bookings</h3>
            <p class="text-3xl font-bold text-slate-900 mt-2">{{ $newBookingsCount }}</p>
            <p class="text-xs text-slate-400 mt-1">In the last 30 days</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-sm font-medium text-slate-500">Registered Users</h3>
            <p class="text-3xl font-bold text-slate-900 mt-2">{{ $totalUsers }}</p>
            <p class="text-xs text-slate-400 mt-1">Total customers</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-bold text-slate-900 mb-4">Recent Bookings</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="text-left text-xs font-semibold text-slate-500 uppercase">
                        <th class="py-2">Customer</th>
                        <th class="py-2">Trip</th>
                        <th class="py-2">Amount</th>
                        <th class="py-2">Status</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse ($recentBookings as $booking)
                        <tr class="border-t border-slate-200">
                            <td class="py-3 font-medium">{{ $booking->user->name }}</td>
                            <td class="py-3 text-slate-600">{{ $booking->title }}</td>
                            <td class="py-3 px-4">Rp{{ number_format($booking->total_amount) }}</td>
                            <td class="py-3 px-4">
                                <div class="flex items-center gap-2">
                                    <span
                                        class="px-2 py-1 {{ $booking->status == 'Lunas' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} rounded-full text-xs">
                                        {{ $booking->status }}
                                    </span>

                                    {{-- Tampilkan tombol centang hanya jika statusnya belum lunas --}}
                                    @if ($booking->status !== 'Lunas')
                                        <form action="{{ route('admin.bookings.confirm', $booking->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-green-600 hover:text-green-800"
                                                title="Konfirmasi Pembayaran">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-8 text-slate-500">No recent bookings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
