<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil - Invoice #{{ $booking->id }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #invoice-box,
            #invoice-box * {
                visibility: visible;
            }

            #invoice-box {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                margin: 0;
                padding: 0;
                border: none;
                box-shadow: none;
            }

            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body class="bg-slate-100">

    <main class="min-h-screen flex flex-col items-center justify-center px-4 py-12">
        <div id="invoice-box"
            class="w-full max-w-3xl bg-white p-8 sm:p-10 rounded-2xl shadow-lg border border-slate-200">

            <div class="flex justify-between items-start pb-8 border-b border-slate-200">
                <div>
                    {{-- GANTI DENGAN PATH LOGO ANDA --}}
                    <img src="/assets/img/fabu.png" alt="Logo Perusahaan" class="h-10">
                    <h2 class="mt-4 text-2xl font-bold text-slate-900">Invoice</h2>
                    <p class="text-sm text-slate-500">Nomor Pesanan: SATWIGA-{{ $booking->id }}</p>
                </div>
                <div class="text-right">
                    <p class="text-xl font-semibold text-teal-600">Lunas</p>
                    <p class="text-sm text-slate-500">Tanggal: {{ $booking->created_at->format('d F Y') }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 py-8">
                <div>
                    <h3 class="font-semibold text-slate-600 mb-2">Diterbitkan untuk:</h3>
                    <p class="font-medium text-slate-800">
                        {{ $booking->user->name ?? ($booking->participant_details[0]['name'] ?? 'Pelanggan') }}</p>
                    <p class="text-slate-500">{{ $booking->user->email ?? 'Email tidak tersedia' }}</p>
                </div>
                <div class="sm:text-right">
                    <h3 class="font-semibold text-slate-600 mb-2">Metode Pembayaran:</h3>
                    <p class="font-medium text-slate-800">
                        {{ strtoupper(str_replace('_', ' ', $booking->payment_method)) }}</p>
                </div>
            </div>

            <div class="border-t border-slate-200 pt-8">
                <h3 class="text-lg font-bold text-slate-900 mb-4">Rincian Pesanan</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-slate-50 text-sm font-semibold text-slate-600">
                                <th class="p-4 rounded-l-lg">Deskripsi</th>
                                <th class="p-4 rounded-r-lg">Peserta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-slate-100">
                                <td class="p-4 font-semibold">{{ $booking->trip_name }}</td>
                                <td class="p-4">
                                    <ol class="list-decimal list-inside text-slate-600">
                                        @foreach ($booking->participant_details as $participant)
                                            <li>{{ $participant['name'] ?? 'Data tidak tersedia' }}</li>
                                        @endforeach
                                    </ol>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-slate-200 flex flex-col items-end">
                <div class="w-full max-w-xs space-y-3">
                    <div class="flex justify-between text-slate-600">
                        <span>Subtotal</span>
                        <span>Rp{{ number_format($booking->total_amount, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-slate-600">
                        <span>Pajak & Layanan</span>
                        <span>Rp0</span>
                    </div>
                    <div class="flex justify-between text-xl font-bold text-slate-900 pt-2 border-t border-dashed">
                        <span>Total Pembayaran</span>
                        <span class="text-blue-700">Rp{{ number_format($booking->total_amount, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12 border-t border-slate-200 pt-6">
                <div class="mx-auto w-16 h-16 flex items-center justify-center bg-teal-50 rounded-full mb-4">
                    <svg class="w-10 h-10 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900">Pembayaran Berhasil!</h3>
                <p class="text-slate-500 mt-2">Terima kasih telah melakukan pemesanan. Sampai jumpa di petualangan
                    berikutnya!</p>
            </div>
        </div>

        <div class="w-full max-w-3xl mt-6 flex flex-col sm:flex-row gap-4 no-print">
            <a href="/"
                class="w-full text-center bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 font-semibold shadow-sm transition-transform active:scale-95">
                Kembali ke Beranda
            </a>
            <button onclick="window.print()"
                class="w-full text-center bg-white text-slate-700 border border-slate-300 py-3 px-6 rounded-lg hover:bg-slate-50 font-semibold transition-transform active:scale-95">
                Cetak / Simpan PDF
            </button>
        </div>
    </main>
</body>

</html>
