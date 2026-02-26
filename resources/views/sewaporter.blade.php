<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Porter - Satwiga Tour</title>

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

    @include('components.navbar', ['is_transparent' => true])

    <div class="relative h-96 overflow-hidden">
        <img src="{{ asset('assets/img/merbabus.jpg') }}" alt="Porter membantu pendaki di gunung"
            class="absolute inset-0 w-full h-full object-cover -z-10 brightness-50">
        <div class="relative h-full flex items-center justify-center">
            <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center">
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl leading-tight">
                    Sewa Porter Profesional & Berpengalaman
                </h1>
                <p class="mt-4 text-lg max-w-2xl text-gray-200 mx-auto">
                    Fokus pada pendakian Anda, biarkan kami yang membantu membawa beban. Jelajahi puncak impian dengan
                    lebih nyaman dan aman.
                </p>
            </div>
        </div>
    </div>

    <main class="container mx-auto max-w-6xl py-16 px-4 sm:py-24">

        <section class="mb-20">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900">Pendakian Lebih Optimal dengan Porter</h2>
                <p class="mt-3 max-w-2xl mx-auto text-lg text-gray-600">Maksimalkan pengalaman pendakian Anda dengan
                    bantuan dari porter lokal kami yang ahli.</p>
            </div>
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
                <div class="flex flex-col items-center">
                    <div
                        class="flex items-center justify-center h-16 w-16 rounded-full bg-gradient-to-br from-blue-500 to-green-500 text-white shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 11c0 3.517-1.009 6.786-2.673 9.356m0 0a9.003 9.003 0 005.346 0M2.673 20.356A9.003 9.003 0 0112 11c0-3.517 1.009-6.786 2.673-9.356m0 0a9.003 9.003 0 015.346 0M19.327 2.644A9.003 9.003 0 0012 11c0 3.517-1.009 6.786-2.673 9.356" />
                        </svg>
                    </div>
                    <h3 class="mt-5 text-xl font-semibold text-gray-900">Navigasi Ahli</h3>
                    <p class="mt-2 text-gray-600">Porter kami adalah penduduk lokal yang menguasai medan dan jalur
                        pendakian, meminimalisir risiko tersesat.</p>
                </div>
                <div class="flex flex-col items-center">
                    <div
                        class="flex items-center justify-center h-16 w-16 rounded-full bg-gradient-to-br from-blue-500 to-green-500 text-white shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                    </div>
                    <h3 class="mt-5 text-xl font-semibold text-gray-900">Beban Lebih Ringan</h3>
                    <p class="mt-2 text-gray-600">Porter akan membantu membawa perlengkapan logistik dan tenda, sehingga
                        Anda bisa mendaki dengan lebih ringan.</p>
                </div>
                <div class="flex flex-col items-center">
                    <div
                        class="flex items-center justify-center h-16 w-16 rounded-full bg-gradient-to-br from-blue-500 to-green-500 text-white shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="mt-5 text-xl font-semibold text-gray-900">Keamanan Terjamin</h3>
                    <p class="mt-2 text-gray-600">Mereka terlatih untuk situasi darurat dan dapat membantu mendirikan
                        tenda serta menyiapkan makanan.</p>
                </div>
            </div>
        </section>

        <section>
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900">Pilih Destinasi Pendakian Anda</h2>
                <p class="mt-3 max-w-2xl mx-auto text-lg text-gray-600">Kami menyediakan jasa porter untuk 4 gunung
                    paling ikonik di Indonesia.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="group relative block bg-black rounded-xl overflow-hidden shadow-lg">
                    <img alt="Gunung Semeru" src="{{ asset('assets/img/mahameru.jpg') }}"
                        class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />
                    <div class="relative p-6 flex flex-col justify-between h-80">
                        <div>
                            <p class="text-sm font-medium uppercase tracking-widest text-green-400">Jawa Timur</p>
                            <h3 class="text-2xl font-bold text-white">Gunung Semeru</h3>
                        </div>
                        <div
                            class="transform-gpu transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100 translate-y-8 opacity-0">
                            <p class="text-sm text-gray-200 mb-4">Taklukkan atap tertinggi Pulau Jawa dengan pemandangan
                                Ranu Kumbolo yang legendaris.</p>
                            <a href="#kontak"
                                class="inline-block bg-white text-gray-900 font-semibold px-5 py-2 rounded-md hover:bg-gray-200 transition-colors">Sewa
                                Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="group relative block bg-black rounded-xl overflow-hidden shadow-lg">
                    <img alt="Gunung Rinjani" src="{{ asset('assets/img/merbabu.png') }}"
                        class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />
                    <div class="relative p-6 flex flex-col justify-between h-80">
                        <div>
                            <p class="text-sm font-medium uppercase tracking-widest text-green-400">Nusa Tenggara Barat
                            </p>
                            <h3 class="text-2xl font-bold text-white">Gunung Rinjani</h3>
                        </div>
                        <div
                            class="transform-gpu transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100 translate-y-8 opacity-0">
                            <p class="text-sm text-gray-200 mb-4">Saksikan keindahan danau kawah Segara Anak dari salah
                                satu gunung berapi terindah di dunia.</p>
                            <a href="#kontak"
                                class="inline-block bg-white text-gray-900 font-semibold px-5 py-2 rounded-md hover:bg-gray-200 transition-colors">Sewa
                                Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="group relative block bg-black rounded-xl overflow-hidden shadow-lg">
                    <img alt="Gunung Merbabu" src="{{ asset('assets/img/merbabus.jpg') }}"
                        class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />
                    <div class="relative p-6 flex flex-col justify-between h-80">
                        <div>
                            <p class="text-sm font-medium uppercase tracking-widest text-green-400">Jawa Tengah</p>
                            <h3 class="text-2xl font-bold text-white">Gunung Merbabu</h3>
                        </div>
                        <div
                            class="transform-gpu transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100 translate-y-8 opacity-0">
                            <p class="text-sm text-gray-200 mb-4">Nikmati hamparan sabana luas dan pemandangan gagah
                                Gunung Merapi dari puncaknya.</p>
                            <a href="#kontak"
                                class="inline-block bg-white text-gray-900 font-semibold px-5 py-2 rounded-md hover:bg-gray-200 transition-colors">Sewa
                                Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="group relative block bg-black rounded-xl overflow-hidden shadow-lg">
                    <img alt="Gunung Kerinci" src="{{ asset('assets/img/merbabu.png') }}"
                        class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />
                    <div class="relative p-6 flex flex-col justify-between h-80">
                        <div>
                            <p class="text-sm font-medium uppercase tracking-widest text-green-400">Jambi, Sumatera</p>
                            <h3 class="text-2xl font-bold text-white">Gunung Kerinci</h3>
                        </div>
                        <div
                            class="transform-gpu transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100 translate-y-8 opacity-0">
                            <p class="text-sm text-gray-200 mb-4">Jelajahi atap Sumatera, gunung berapi tertinggi di
                                Indonesia dengan hutan tropis yang lebat.</p>
                            <a href="#kontak"
                                class="inline-block bg-white text-gray-900 font-semibold px-5 py-2 rounded-md hover:bg-gray-200 transition-colors">Sewa
                                Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="kontak" class="mt-24 bg-gradient-to-r from-blue-600 to-green-500 rounded-2xl shadow-xl">
            <div class="mx-auto max-w-4xl px-6 py-16 text-center">
                <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                    Siap untuk Petualangan Anda?
                </h2>
                <p class="mx-auto mt-4 max-w-xl text-lg text-blue-100">
                    Hubungi tim kami melalui WhatsApp untuk konsultasi, cek ketersediaan, dan pemesanan porter untuk
                    pendakian Anda.
                </p>
                <a href="https://wa.me/6281234567890?text=Halo%20Satwiga%20Tour,%20saya%20tertarik%20untuk%20menyewa%20porter."
                    target="_blank"
                    class="mt-8 inline-flex w-full items-center justify-center rounded-full border border-transparent bg-white px-6 py-3 text-base font-semibold text-blue-600 shadow-md transition hover:bg-blue-50 sm:w-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                    </svg>
                    Hubungi via WhatsApp
                </a>
            </div>
        </section>

    </main>

    @include('components.footer')

</body>

</html>
