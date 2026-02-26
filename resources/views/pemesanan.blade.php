<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan Saya - Satwiga Tour</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-300">
    @include('components.navbar')

    <main class="container mx-auto px-4 py-32">
        <div class="max-w-4xl mx-auto">
            <div class="mb-8">
                <h1 class="text-3xl font-extrabold text-gray-900">Riwayat Pesanan Saya</h1>
                <p class="text-gray-600">Halo, {{ Auth::user()->name }}! Di sini Anda dapat melihat semua struk
                    perjalanan Anda.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-xl font-bold text-gray-900 border-b pb-3 mb-4">Daftar Transaksi</h2>
                <div class="space-y-4">
                    @forelse ($bookings as $booking)
                        <div class="border p-4 rounded-lg hover:bg-gray-50 transition">
                            <div class="flex flex-col sm:flex-row justify-between">
                                <div>
                                    <p class="font-bold text-lg text-indigo-600">{{ $booking->trip_name }}</p>
                                    <p class="text-sm text-gray-500">ID Pesanan: SATWIGA-{{ $booking->id }}</p>
                                    <p class="text-sm text-gray-500">Tanggal Pesan:
                                        {{ $booking->created_at->format('d F Y') }}</p>
                                </div>
                                <div class="mt-2 sm:mt-0 text-left sm:text-right">
                                    <p class="font-bold text-xl">
                                        Rp{{ number_format($booking->total_amount, 0, ',', '.') }}</p>
                                    <span
                                        class="px-2 py-1 text-xs font-semibold rounded-full capitalize
                                        @if ($booking->status == 'success') bg-green-100 text-green-800 @else bg-yellow-100 text-yellow-800 @endif">
                                        {{ $booking->status }}
                                    </span>
                                </div>
                            </div>

                            <div class="border-t mt-3 pt-3 text-right">
                                <a href="{{ route('bookings.show', $booking->id) }}"
                                    class="inline-block text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition">
                                    Lihat Detail &rarr;
                                </a>
                            </div>

                        </div>
                    @empty
                        {{-- Ini adalah blok @empty yang BENAR, berada di dalam @forelse --}}
                        <div class="text-center py-8">
                            <p class="text-gray-500">Anda belum memiliki riwayat pesanan.</p>
                            <a href="/opentrip"
                                class="mt-4 inline-block text-indigo-600 font-semibold hover:underline">Cari Trip
                                Pertama Anda!</a>
                        </div>
                    @endforelse
                    {{-- Blok yang duplikat telah dihapus --}}
                </div>
            </div>
        </div>
    </main>

    @include('components.footer')
</body>

</html>
