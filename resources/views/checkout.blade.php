<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan - Satwiga Tour</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50">
    @include('components.navbar')

    <main class="container mx-auto max-w-6xl py-24 px-4" x-data="{ selectedPayment: null }">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900">Konfirmasi Pesanan Anda</h1>
            <p class="mt-2 text-lg text-gray-600">Satu langkah lagi! Mohon periksa kembali detail pesanan Anda.</p>
        </div>

        <form action="{{ route('payment.process') }}" method="POST">
            @csrf
            {{-- Input tersembunyi untuk mengirim data final ke PaymentController --}}
            <input type="hidden" name="trip_id" value="{{ $trip->id }}">
            <input type="hidden" name="total_amount" value="{{ $total_amount }}">
            <input type="hidden" name="participant_count" value="{{ $total_participants }}">
            <input type="hidden" name="participant_details" value="{{ json_encode($participants_details) }}">

            <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-12">
                {{-- Bagian Kiri (Detail Perjalanan & Data Peserta) --}}
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <h2 class="text-xl font-bold text-gray-900 border-b pb-3 mb-4">Detail Perjalanan</h2>
                        <div class="flex items-start space-x-4">
                            <img src="{{ asset('storage/' . $trip->image_path) }}"
                                class="w-24 h-24 object-cover rounded-lg flex-shrink-0">
                            <div>
                                <h3 class="font-bold text-lg">{{ $trip->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $trip->start_date->format('d M') }} -
                                    {{ $trip->end_date->format('d M Y') }}</p>
                                <p class="text-sm text-gray-500">{{ $trip->duration }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <h2 class="text-xl font-bold text-gray-900 border-b pb-3 mb-4">Data Peserta</h2>
                        <div class="space-y-3">
                            @foreach ($participants_details as $index => $participant)
                                <div class="border rounded-lg p-3 text-sm">
                                    <p><strong>{{ $index + 1 }}. Nama:</strong> {{ $participant['name'] }}</p>
                                    <p><strong>No. KTP:</strong> {{ $participant['ktp'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Bagian Kanan (Ringkasan & Metode Pembayaran) --}}
                <div class="mt-10 lg:mt-0">
                    <div class="bg-white p-6 rounded-xl shadow-md lg:sticky lg:top-24">
                        <h2 class="text-xl font-bold text-gray-900 border-b pb-3 mb-4">Ringkasan Pembayaran</h2>
                        <div class="space-y-3">
                            <div class="flex justify-between text-gray-600">
                                <span>{{ $total_participants }} Peserta x Rp{{ number_format($trip->price) }}</span>
                                <span>Rp{{ number_format($total_amount) }}</span>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t">
                            <h3 class="font-semibold text-gray-900 mb-3">Pilih Metode Pembayaran</h3>
                            <div class="space-y-3">
                                <label class="flex items-center p-3 border rounded-lg cursor-pointer"
                                    :class="{ 'border-blue-600 bg-blue-50': selectedPayment === 'qris' }">
                                    <input type="radio" name="payment_method" value="qris" x-model="selectedPayment"
                                        class="h-4 w-4 text-blue-600" required>
                                    <span class="ml-3 font-medium text-gray-700">QRIS</span>
                                </label>
                                <label class="flex items-center p-3 border rounded-lg cursor-pointer"
                                    :class="{ 'border-blue-600 bg-blue-50': selectedPayment === 'bca_va' }">
                                    <input type="radio" name="payment_method" value="bca_va" x-model="selectedPayment"
                                        class="h-4 w-4 text-blue-600">
                                    <span class="ml-3 font-medium text-gray-700">BCA Virtual Account</span>
                                </label>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" :disabled="!selectedPayment"
                                :class="{ 'bg-blue-600 hover:bg-blue-700': selectedPayment, 'bg-gray-400 cursor-not-allowed':
                                        !selectedPayment }"
                                class="w-full text-center rounded-md py-3 font-medium text-white transition">
                                Lanjutkan ke Pembayaran
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    @include('components.footer')
</body>

</html>
