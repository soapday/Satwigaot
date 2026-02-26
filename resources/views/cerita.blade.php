<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerita Perjalanan - Satwiga Tour</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white">

    @include('components.navbar')

    <main>
        <section class="bg-slate-50 py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center">
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">
                    Kisah Perjalanan Kami
                </h1>
                <p class="mt-6 text-lg leading-8 text-gray-600 max-w-3xl mx-auto">
                    Setiap perjalanan adalah sebuah cerita. Lihat kembali momen-momen tak terlupakan yang telah kami lalui bersama para petualang hebat dari seluruh penjuru.
                </p>
            </div>
        </section>

        <section class="py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center mb-16">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Galeri Petualangan</h2>
                    <p class="mt-4 text-lg text-gray-600">Jelajahi dokumentasi trip-trip terbaik kami.</p>
                </div>

                <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">

                    <a href="#" class="group relative block overflow-hidden rounded-2xl shadow-lg">
                        <img src="assets/img/mahameru.jpg" alt="Puncak Mahameru" class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent"></div>
                        <div class="relative flex h-full flex-col justify-end p-6 text-white">
                            <p class="text-sm font-semibold uppercase tracking-widest">Ekspedisi Oktober 2025</p>
                            <h3 class="mt-2 text-2xl font-bold">Menaklukkan Atap Jawa</h3>
                            <p class="mt-2 text-gray-300">Menyaksikan lautan awan dari puncak tertinggi di Pulau Jawa, sebuah pencapaian yang tak ternilai.</p>
                        </div>
                    </a>

                    <a href="#" class="group relative block overflow-hidden rounded-2xl shadow-lg">
                        <img src="assets/img/merbabu.png" alt="Sabana Gunung Merbabu" class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent"></div>
                        <div class="relative flex h-full flex-col justify-end p-6 text-white">
                            <p class="text-sm font-semibold uppercase tracking-widest">Trip September 2025</p>
                            <h3 class="mt-2 text-2xl font-bold">Pesona Sabana Merbabu</h3>
                            <p class="mt-2 text-gray-300">Berjalan di tengah hamparan padang sabana yang luas, dihiasi pemandangan gagah Gunung Merapi.</p>
                        </div>
                    </a>

                    <a href="#" class="group relative block overflow-hidden rounded-2xl shadow-lg">
                        <img src="assets/img/ranukumbolo.jpg" alt="Danau Ranu Kumbolo" class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent"></div>
                        <div class="relative flex h-full flex-col justify-end p-6 text-white">
                            <p class="text-sm font-semibold uppercase tracking-widest">Trip Agustus 2025</p>
                            <h3 class="mt-2 text-2xl font-bold">Fajar Magis Ranu Kumbolo</h3>
                            <p class="mt-2 text-gray-300">Keindahan surgawi saat matahari terbit perlahan dari balik bukit, memantulkan cahayanya di danau yang tenang.</p>
                        </div>
                    </a>

                    </div>
            </div>
        </section>

        <section class="bg-slate-100 py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Apa Kata Mereka?</h2>
                    <figure class="mt-10">
                        <blockquote class="text-center text-xl font-semibold leading-8 text-gray-900 sm:text-2xl sm:leading-9">
                            <p>“Ini adalah pengalaman pendakian terbaik yang pernah saya ikuti. Pemandu profesional, fasilitas lengkap, dan teman-teman baru yang seru. Satwiga Tour benar-benar membuat perjalanan ke Semeru tak terlupakan!”</p>
                        </blockquote>
                        <figcaption class="mt-10">
                            <img class="mx-auto h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1552058544-f2b08422138a?q=80&w=2598&auto=format&fit=crop" alt="Foto peserta">
                            <div class="mt-4 flex items-center justify-center space-x-3 text-base">
                                <div class="font-semibold text-gray-900">Ahmad Subagja</div>
                                <svg viewBox="0 0 2 2" width="3" height="3" aria-hidden="true" class="fill-gray-900">
                                    <circle cx="1" cy="1" r="1" />
                                </svg>
                                <div class="text-gray-600">Peserta Trip Semeru</div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </section>

        <section class="py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Siap Menulis Cerita Petualangan<br>Anda Sendiri?
                </h2>
                <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-gray-600">
                    Jangan hanya menjadi penonton. Ayo bergabung dengan kami dan ciptakan momen tak terlupakan di puncak-puncak tertinggi Indonesia.
                </p>
                <div class="mt-10">
                    <a href="/reservasi-open-trip" class="rounded-md bg-indigo-600 px-8 py-3 text-base font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Lihat Jadwal & Pesan Sekarang
                    </a>
                </div>
            </div>
        </section>

    </main>

    {{-- @include('components.footer') --}}

</body>
</html>
