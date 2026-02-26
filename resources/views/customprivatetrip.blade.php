<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Private Trip Kustom - Satwiga Tour</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50">

    @include('components.navbar')

    <div class="container mx-auto max-w-4xl pt-32 pb-16 px-4">

        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">
                Rencanakan Petualangan Kustom Anda
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
                Isi formulir di bawah ini dengan detail sebanyak mungkin. Tim kami akan segera menghubungi Anda dengan proposal dan penawaran terbaik.
            </p>
        </div>

        <div class="bg-white p-8 sm:p-10 rounded-2xl shadow-lg">
            <form action="#" method="POST">
                <div class="space-y-10">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 border-b pb-2 mb-6">1. Informasi Kontak</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>
                            <div>
                                <label for="whatsapp" class="block text-sm font-medium text-gray-700">Nomor WhatsApp</label>
                                <input type="tel" name="whatsapp" id="whatsapp" required placeholder="08123456789" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 border-b pb-2 mb-6">2. Detail Rencana Perjalanan</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label for="destinasi" class="block text-sm font-medium text-gray-700">Destinasi Impian</label>
                                <input type="text" name="destinasi" id="destinasi" required placeholder="Contoh: Gunung Leuser, Sumatera Utara" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>
                            <div>
                                <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">Perkiraan Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>
                            <div>
                                <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700">Perkiraan Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>
                            <div>
                                <label for="jumlah_peserta" class="block text-sm font-medium text-gray-700">Jumlah Peserta</label>
                                <input type="number" name="jumlah_peserta" id="jumlah_peserta" min="1" required placeholder="Contoh: 4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>
                            <div>
                                <label for="anggaran" class="block text-sm font-medium text-gray-700">Anggaran per Orang (Estimasi)</label>
                                <select name="anggaran" id="anggaran" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                                    <option value="">Pilih Anggaran</option>
                                    <option value="< 2jt">&lt; Rp 2.000.000</option>
                                    <option value="2-4jt">Rp 2.000.000 - Rp 4.000.000</option>
                                    <option value="4-7jt">Rp 4.000.000 - Rp 7.000.000</option>
                                    <option value="> 7jt">&gt; Rp 7.000.000</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 border-b pb-2 mb-6">3. Preferensi & Permintaan Khusus</h2>
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Fokus Aktivitas (Bisa pilih lebih dari satu)</label>
                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                    <div class="flex items-center">
                                        <input id="pendakian" name="aktivitas[]" value="Pendakian" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-green-600 focus:ring-green-500">
                                        <label for="pendakian" class="ml-2 block text-sm text-gray-900">Pendakian</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="fotografi" name="aktivitas[]" value="Fotografi" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-green-600 focus:ring-green-500">
                                        <label for="fotografi" class="ml-2 block text-sm text-gray-900">Fotografi</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="snorkeling" name="aktivitas[]" value="Snorkeling/Diving" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-green-600 focus:ring-green-500">
                                        <label for="snorkeling" class="ml-2 block text-sm text-gray-900">Snorkeling/Diving</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="budaya" name="aktivitas[]" value="Budaya Lokal" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-green-600 focus:ring-green-500">
                                        <label for="budaya" class="ml-2 block text-sm text-gray-900">Budaya Lokal</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="santai" name="aktivitas[]" value="Santai & Alam" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-green-600 focus:ring-green-500">
                                        <label for="santai" class="ml-2 block text-sm text-gray-900">Santai & Alam</label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="permintaan_khusus" class="block text-sm font-medium text-gray-700">Catatan atau Permintaan Khusus</label>
                                <textarea name="permintaan_khusus" id="permintaan_khusus" rows="4" placeholder="Contoh: Butuh dokumentasi drone, salah satu peserta vegetarian, dll." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-12 pt-8 border-t">
                    <button type="submit" class="w-full justify-center rounded-lg text-lg font-semibold text-white py-3 px-6 transition-all duration-300
                                                 bg-gradient-to-r from-blue-500 to-green-500 hover:from-blue-600 hover:to-green-600 shadow-md hover:shadow-lg">
                        Kirim Permintaan Trip
                    </button>
                </div>

            </form>
        </div>
    </div>

    @include('components.footer')

</body>

</html>
