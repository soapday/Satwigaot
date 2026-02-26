<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selesaikan Pembayaran - {{ $booking->trip_name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800">

    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        <div class="max-w-4xl mx-auto mb-6 text-center">
            <h1 class="text-3xl font-bold text-slate-900">Selesaikan Pembayaran Anda</h1>
            <p class="text-slate-500 mt-2">Selesaikan transaksi untuk melanjutkan petualangan Anda.</p>
        </div>

        <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="md:col-span-2 bg-white p-6 sm:p-8 rounded-xl shadow-sm border border-slate-200">

                <div class="text-center mb-6 border-b border-dashed pb-6">
                    <p class="text-slate-600">Batas Waktu Pembayaran</p>
                    <div id="countdown-timer" class="text-2xl font-bold text-red-600 mt-2">
                        <span>00</span>:<span>00</span>:<span>00</span>
                    </div>
                </div>
                <h2 class="text-xl font-bold text-slate-900 mb-6">Instruksi Pembayaran</h2>

                @if ($booking->payment_method == 'qris')
                    <div>
                        <h3 class="font-semibold text-lg">Scan QRIS</h3>
                        <p class="text-slate-500 mt-1 mb-6">Gunakan aplikasi e-wallet atau m-banking favorit Anda.</p>
                        <div class="flex justify-center items-center p-4 bg-slate-50 rounded-lg">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=SATWIGATOUR-{{ $booking->id }}"
                                alt="Kode QR Pembayaran" class="w-56 h-56 rounded-lg shadow-md border-4 border-white">
                        </div>
                    </div>
                @endif

                @if ($booking->payment_method == 'bca_va')
                    <div>
                        <h3 class="font-semibold text-lg">BCA Virtual Account</h3>
                        <p class="text-slate-500 mt-1 mb-6">Salin nomor di bawah dan bayar melalui m-banking atau ATM
                            BCA.</p>
                        <div class="mb-6">
                            <label class="text-sm font-medium text-white-600">Nomor Virtual Account</label>
                            <div class="mt-2 flex items-center gap-2">
                                <input type="text" id="vaNumber" value="88081234567890" readonly
                                    class="w-full bg-slate-100 border-slate-300 rounded-lg px-4 py-3 text-lg font-bold tracking-wider " style="background-color:#F0F8FF; border-color: #F0F8FF; ">
                                <button onclick="copyToClipboard()"
                                    class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold py-3 px-4 rounded-lg transition">
                                    Salin
                                </button>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-semibold text-md text-slate-800 mb-3">Langkah-langkah Pembayaran</h4>
                            <ul class="list-decimal list-inside space-y-2 text-slate-600 text-sm">
                                <li>Buka aplikasi BCA Mobile, pilih **m-Transfer**.</li>
                                <li>Pilih **BCA Virtual Account**.</li>
                                <li>Masukkan nomor Virtual Account di atas dan pilih **Send**.</li>
                                <li>Periksa detail transaksi Anda, lalu masukkan PIN m-BCA.</li>
                                <li>Pembayaran selesai!</li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>

            <div class="md:col-span-1">
                <div class="bg-white p-6 sm:p-8 rounded-xl shadow-sm border border-slate-200">
                    <h3 class="text-lg font-bold text-slate-900 border-b border-slate-200 pb-4 mb-4">Ringkasan Pesanan
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-slate-500">Pesanan Trip</p>
                            <p class="font-semibold text-md">{{ $booking->trip_name }}</p>
                        </div>
                        <div class="bg-slate-50 border border-slate-200 rounded-lg p-4 text-center">
                            <p class="text-sm text-slate-600">Total Pembayaran</p>
                            <p class="text-3xl font-extrabold text-blue-600">
                                Rp{{ number_format($booking->total_amount, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-8 space-y-3">
                        <a href="{{ route('payment.invoice', ['booking' => $booking->id]) }}"
                            class="w-full text-center block bg-blue-600 text-white font-semibold py-3 px-4 rounded-lg hover:bg-blue
                            -700 focus:ring-4 focus:ring-blue-200 transition-all duration-300">
                            Saya Sudah Membayar
                        </a>

                        {{-- Form pembatalan sekarang memiliki ID agar bisa di-submit oleh JavaScript --}}
                        <form id="cancel-form" action="{{ route('payment.cancel', ['booking' => $booking->id]) }}"
                            method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full text-center block bg-transparent text-slate-500 font-semibold py-3 px-4 rounded-lg hover:bg-slate-100 transition-colors duration-300">
                                Batalkan Pesanan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard() {
            const vaInput = document.getElementById('vaNumber');
            vaInput.select();
            vaInput.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(vaInput.value).then(() => {
                alert("Nomor Virtual Account berhasil disalin!");
            }).catch(err => {
                alert("Gagal menyalin. Coba lagi.");
            });
        }

        // ====== SCRIPT BARU UNTUK TIMER ======
        document.addEventListener('DOMContentLoaded', function() {
            const timerElement = document.getElementById('countdown-timer');
            const cancelForm = document.getElementById('cancel-form');

            // Ambil waktu booking dibuat dari PHP dan tambahkan 1 jam (3600 detik)
            const bookingCreatedAt = new Date('{{ $booking->created_at->toISOString() }}').getTime();
            const expirationTime = bookingCreatedAt + (3600 * 1000); // 1 jam dalam milidetik

            const countdownInterval = setInterval(function() {
                const now = new Date().getTime();
                const distance = expirationTime - now;

                // Hitung sisa waktu
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Tampilkan di elemen timer
                if (distance > 0) {
                    timerElement.innerHTML =
                        `<span>${String(hours).padStart(2, '0')}</span>:` +
                        `<span>${String(minutes).padStart(2, '0')}</span>:` +
                        `<span>${String(seconds).padStart(2, '0')}</span>`;
                } else {
                    // Jika waktu habis
                    clearInterval(countdownInterval);
                    timerElement.innerHTML = "WAKTU HABIS";
                    alert("Waktu pembayaran Anda telah habis. Pesanan akan dibatalkan secara otomatis.");

                    // Batalkan pesanan secara otomatis
                    cancelForm.submit();
                }
            }, 1000);
        });
    </script>
</body>

</html>
