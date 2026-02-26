<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - Satwiga Tour</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50">
    @include('components.navbar')

    <main class="container mx-auto px-4 py-32">
        <div class="max-w-4xl mx-auto">
            <div class="mb-8">
                <a href="{{ route('pemesanan.show') }}"
                    class="text-indigo-600 hover:text-indigo-800 font-semibold text-sm">&larr; Kembali ke Riwayat
                    Pesanan</a>
                <h1 class="text-3xl font-extrabold text-slate-900 mt-2">Detail Pesanan</h1>
                <p class="text-slate-600">ID Pesanan: SATWIGA-{{ $booking->id }}</p>
            </div>

            <div class="bg-white p-6 sm:p-8 rounded-xl shadow-sm border border-slate-200">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 pb-6 border-b border-dashed">
                    <div>
                        <p class="text-sm text-slate-500">Trip</p>
                        <p class="font-bold text-lg text-slate-800">{{ $booking->trip_name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">Tanggal Pemesanan</p>
                        <p class="font-semibold text-slate-800">{{ $booking->created_at->format('d F Y') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">Status</p>
                        <span
                            class="px-3 py-1 text-sm font-semibold rounded-full capitalize
                            @if ($booking->status == 'success') bg-green-100 text-green-800 @else bg-yellow-100 text-yellow-800 @endif">
                            {{ $booking->status }}
                        </span>
                    </div>
                </div>

                <div class="py-6">
                    <h2 class="text-xl font-bold text-slate-900 mb-4">Data Peserta</h2>
                    <div class="space-y-4">
                        @foreach ($booking->participant_details as $index => $participant)
                            <div class="border border-slate-200 rounded-lg p-4">
                                <p class="font-semibold text-indigo-700 mb-2">Peserta {{ $index + 1 }}</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-2 text-sm">
                                    <div>
                                        <span class="text-slate-500">Nama Lengkap:</span>
                                        <p class="font-medium text-slate-800">
                                            {{ $participant['name'] ?? 'Tidak ada data' }}</p>
                                    </div>
                                    <div>
                                        <span class="text-slate-500">Nomor Telepon:</span>
                                        <p class="font-medium text-slate-800">
                                            {{ $participant['phone'] ?? 'Tidak ada data' }}</p>
                                    </div>
                                    <div>
                                        <span class="text-slate-500">Nomor KTP:</span>
                                        <p class="font-medium text-slate-800">
                                            {{ $participant['ktp'] ?? 'Tidak ada data' }}</p>
                                    </div>
                                    {{-- Tambahkan data lain jika ada, contoh: --}}
                                    {{--
                                    <div>
                                        <span class="text-slate-500">Alamat:</span>
                                        <p class="font-medium text-slate-800">{{ $participant['address'] ?? 'Tidak ada data' }}</p>
                                    </div>
                                    --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="pt-6 border-t border-dashed flex justify-end">
                    <div class="w-full max-w-sm space-y-2">
                        <div class="flex justify-between text-slate-600">
                            <span>Subtotal</span>
                            <span>Rp{{ number_format($booking->total_amount, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-slate-600">
                            <span>Biaya Layanan</span>
                            <span>Rp0</span>
                        </div>
                        <div class="flex justify-between font-bold text-lg text-slate-900 pt-2 border-t">
                            <span>Total Pembayaran</span>
                            <span
                                class="text-indigo-600">Rp{{ number_format($booking->total_amount, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('components.footer')
</body>

</html>
