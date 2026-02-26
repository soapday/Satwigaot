<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Open Trip: {{ $trip->title }} - Satwiga Tour</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-slate-50" x-data='tripDetail(@json($trip))' x-cloak>
    @include('components.navbar')

    <main class="container mx-auto max-w-6xl pt-32 pb-12 px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            {{-- Thumbnail Galeri --}}
            <div>
                {{-- 1. Gambar Utama yang Besar --}}
                <img :src="mainImage" alt="Gambar Utama Trip"
                    class="w-full h-[400px] md:h-[500px] object-cover rounded-2xl shadow-sm mb-4 transition-all duration-300 bg-slate-200">

                {{-- 2. Kotak-kotak Thumbnail di bawahnya --}}
                <div class="grid grid-cols-4 gap-3">
                    {{-- Thumbnail 1 (Gambar Utama) --}}
                    <div>
                        <img src="{{ asset('storage/' . $trip->image_path) }}"
                            @click="mainImage = '{{ asset('storage/' . $trip->image_path) }}'"
                            :class="{ 'border-4 border-slate-800 opacity-100': mainImage === '{{ asset('storage/' . $trip->image_path) }}', 'opacity-50 hover:opacity-100': mainImage !== '{{ asset('storage/' . $trip->image_path) }}' }"
                            class="h-20 sm:h-24 w-full object-cover rounded-xl cursor-pointer transition-all bg-slate-200">
                    </div>

                    {{-- Loop untuk thumbnail galeri tambahan (jika ada) --}}
                    @if (!empty($trip->images) && is_iterable($trip->images))
                        @foreach ($trip->images as $image)
                            <div>
                                <img src="{{ asset('storage/' . $image->path) }}"
                                    @click="mainImage = '{{ asset('storage/' . $image->path) }}'"
                                    :class="{ 'border-4 border-slate-800 opacity-100': mainImage === '{{ asset('storage/' . $image->path) }}', 'opacity-50 hover:opacity-100': mainImage !== '{{ asset('storage/' . $image->path) }}' }"
                                    class="h-20 sm:h-24 w-full object-cover rounded-xl cursor-pointer transition-all bg-slate-200">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="flex flex-col">
                <h1 class="text-3xl font-extrabold tracking-tight text-slate-900">{{ $trip->name }}</h1>
                <p class="text-lg text-slate-500">{{ $trip->start_date->format('d M') }} -
                    {{ $trip->end_date->format('d M Y') }}</p>
                <div class="mt-4">
                    <p class="text-3xl font-bold text-slate-900">Rp{{ number_format($trip->price) }} / pax</p>
                </div>
                <div class="mt-6 pt-6 border-t">
                    <h3 class="font-semibold text-slate-900 mb-2">Detail Perjalanan</h3>
                    <div class="grid grid-cols-2 gap-x-4 gap-y-2 text-slate-600">
                        <p><strong>Jalur:</strong> {{ $trip->route }}</p>
                        <p><strong>Level:</strong> {{ $trip->difficulty }}</p>
                        <p><strong>Durasi:</strong> {{ $trip->duration }}</p>
                        <p><strong>Ketinggian:</strong> {{ $trip->altitude }}</p>
                        <p><strong>Provinsi:</strong> {{ $trip->province }}</p>
                        <p><strong>Sisa Slot:</strong> <span
                                class="font-bold text-blue-700">{{ $trip->slot - $trip->booked }}</span></p>
                    </div>
                </div>
                <div class="mt-6 pt-6 border-t flex-grow">
                    <h3 class="font-semibold text-slate-900">Atur Jumlah Peserta</h3>
                    <div class="flex items-center justify-between mt-2">
                        <input type="number" x-model.number="participantCount" @input="updateHikers()" min="1"
                            max="{{ $trip->slot - $trip->booked }}"
                            class="w-24 rounded-md text-slate-900 border-gray-0 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <div>
                            <p class="text-sm text-slate-500">Subtotal</p>
                            <p class="text-xl font-bold text-slate-900"
                                x-text="`Rp${subtotal.toLocaleString('id-ID')}`"></p>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <button @click="showForm = true"
                        class="w-full justify-center rounded-md border border-transparent bg-blue-600 py-3 px-6 text-base font-medium text-white shadow-sm hover:bg-blue-700">
                        Lanjut Isi Data Diri
                    </button>
                </div>
            </div>
        </div>

        <div class="mt-12" x-show="showForm" x-transition.origin.top.duration.500ms x-cloak>
            <div class="border-t-2 border-dashed border-slate-200 pt-8 mt-10">
                <h3 class="text-xl font-bold text-slate-900">Formulir Pendaftaran</h3>
                <p class="text-slate-500 mb-6">Silakan isi data untuk <strong x-text="participantCount"></strong>
                    peserta.</p>

                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                    <input type="hidden" name="total_participants" :value="participantCount">
                    <input type="hidden" name="total_amount" :value="subtotal">

                    <div class="space-y-4">
                        <template x-for="(hiker, index) in hikers" :key="index">
                            <div class="border rounded-lg bg-gray-50 overflow-hidden" x-data="{ expanded: (index === 0) }">
                                <button type="button" @click="expanded = !expanded"
                                    class="w-full flex justify-between items-center p-4 bg-slate-100 hover:bg-slate-200 transition-colors">
                                    <p class="font-bold text-slate-800" x-text="`Peserta ${index + 1}`"></p>
                                    <svg :class="{ 'rotate-180': expanded }"
                                        class="w-5 h-5 transform transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="expanded" x-transition class="p-4">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div class="sm:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                            <input type="text" :name="`participants[${index}][name]`"
                                                x-model="hiker.name" required
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Nomor KTP</label>
                                            <input type="number" :name="`participants[${index}][ktp]`"
                                                x-model="hiker.ktp" required
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Nomor
                                                WhatsApp</label>
                                            <input type="number" :name="`participants[${index}][phone]`"
                                                x-model="hiker.phone" required
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Riwayat Penyakit
                                                (jika ada)</label>
                                            <input type="text" :name="`participants[${index}][medical_history]`"
                                                x-model="hiker.medical_history" placeholder="Contoh: Asma, Hipertensi"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Apakah peserta
                                                penyandang disabilitas?</label>
                                            <select :name="`participants[${index}][is_disabled]`"
                                                x-model="hiker.is_disabled"
                                                class="mt-1 block w-full rounded-md text-gray-700 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                <option value="tidak">Tidak</option>
                                                <option value="ya">Ya</option>
                                            </select>
                                        </div>
                                        <div x-show="hiker.is_disabled === 'ya'" class="sm:col-span-2" x-cloak>
                                            <label class="block text-sm font-medium text-gray-700">Jenis
                                                Disabilitas</label>
                                            <select :name="`participants[${index}][disability_type]`"
                                                x-model="hiker.disability_type"
                                                :required="hiker.is_disabled === 'ya'"
                                                class="mt-1 block w-full rounded-md text-gray-700 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                <option value="">Pilih Jenis Disabilitas</option>
                                                <option value="fisik">Fisik</option>
                                                <option value="sensorik_penglihatan">Sensorik (Penglihatan)</option>
                                                <option value="sensorik_pendengaran">Sensorik (Pendengaran)</option>
                                                <option value="intelektual">Intelektual</option>
                                                <option value="mental">Mental</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                    <div class="mt-8">
                        <button type="submit"
                            class="w-full text-center rounded-md border border-transparent bg-blue-600 py-3 px-6 text-base font-medium text-white shadow-sm hover:bg-blue-700">Lanjut
                            ke Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    @include('components.footer')

    <script>
        function tripDetail(tripData) {
            return {
                trip: tripData,
                participantCount: 1,
                showForm: false,
                mainImage: '{{ asset('storage/' . $trip->image_path) }}',
                participantCount: 1,
                showForm: false,
                hikers: [{
                    name: '',
                    ktp: '',
                    phone: '',
                    medical_history: '',
                    is_disabled: 'tidak',
                    disability_type: ''
                }],

                updateHikers() {
                    if (!this.trip) return;
                    const maxAvailable = this.trip.slot - this.trip.booked;
                    if (this.participantCount > maxAvailable) this.participantCount = maxAvailable;
                    if (this.participantCount < 1 || !this.participantCount) this.participantCount = 1;

                    const count = this.participantCount;
                    const currentCount = this.hikers.length;
                    if (count > currentCount) {
                        for (let i = 0; i < count - currentCount; i++) {
                            this.hikers.push({
                                name: '',
                                ktp: '',
                                phone: '',
                                medical_history: '',
                                is_disabled: 'tidak',
                                disability_type: ''
                            });
                        }
                    } else if (count < currentCount) {
                        this.hikers.splice(count);
                    }
                },

                get subtotal() {
                    return this.trip ? this.trip.price * this.participantCount : 0;
                }
            }
        }
    </script>
</body>

</html>
