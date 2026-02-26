<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Satwiga Tour - Jelajahi Surga Tersembunyi Indonesia</title>

    <script>
        (function() {
            try {
                const t = localStorage.getItem('theme');
                if (t === 'dark' || (!t && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            } catch (e) {}
        })();
        window.tailwind = window.tailwind || {};
        tailwind.config = {
            darkMode: 'class'
        };

        window.tailwind = window.tailwind || {};
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            primary: "#1D5CA8",
            primaryDark: "#0F3C75",
            accent: "#F7B500",
            softGray: "#F4F6F8",
            neutralBlack: "#1A1A1A",
          },
          boxShadow: { soft: "0 8px 24px rgba(0,0,0,0.08)" },
          borderRadius: { xl2: "1rem" }
        }
      }
    };
  </script>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-white text-neutralBlack transition-colors theme-anim duration-300">
    @include('components.navbar', ['isTransparent' => true])

    <div class="relative h-screen overflow-hidden">
        <img src="assets/img/merbabu.png" alt="Pemandangan gunung di Indonesia"
            class="absolute inset-0 w-full h-full object-cover -z-10">
        <div class="absolute inset-0 bg-black/40 -z-10"></div>

        <!-- Header (posisi tombol tema) -->
        <header class="absolute top-0 left-0 right-0 z-10 w-full">
            <!-- Toggle Dark/Light -->

        </header>

        <div class="relative h-full flex items-center">
            <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center lg:text-left">
                <h1 class="h1 text-white">
                    Jelajahi Surga Tersembunyi Indonesia
                </h1>
                <p class="p text-white">
                    Paket open trip pendakian terpercaya dengan pemandu profesional.
                </p>

                <div class="mt-10">
                    <a href="#" alt="klik untuk lihat semua open trip kami"
                        class="inline-block rounded-full bg-white/10 px-8 py-3 text-sm font-semibold text-white border border-white/30 backdrop-blur-sm hover:bg-white/20 transition-colors">
                        Lihat Semua Trip
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-container">
        <div class="sticky-viewport">

            <section class="scroll-section">
                <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center theme-anim duration-300">
                    <div class="w-full h-[60vh] rounded-2xl overflow-hidden shadow-2xl">
                        <img src="assets/img/ranukumbolo.jpg"
                            alt="Pemandangan Danau Ranu Kumbolo dengan latar belakang pegunungan"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="animation-target">
                        <h2 class="h2">Fajar di Ranu Kumbolo</h2>
                        <p class="p">
                            Danau magis di ketinggian 2.400 mdpl ini adalah tempat istirahat pertama yang sempurna.
                            Udara dingin dan pemandangan danau yang tenang menjadi sambutan pertama di surga Semeru.
                        </p>
                    </div>
                </div>
            </section>

            <section class="scroll-section">
                <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="w-full h-[60vh] rounded-2xl overflow-hidden shadow-2xl">
                        <img src="assets/img/mahameru.jpg" alt="Pemandangan puncak Mahameru yang tertutup awan"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="animation-target">
                        <h2 class="h2">Menuju Puncak Mahameru</h2>
                        <p class="p">
                            Perjuangan terakhir melewati lautan pasir menuju atap Jawa. Setiap langkah terasa berat,
                            namun semangat untuk mencapai puncak membakar segalanya.
                        </p>
                    </div>
                </div>
            </section>

            <section class="scroll-section">
                <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="w-full h-[60vh] rounded-2xl overflow-hidden shadow-2xl">
                        <img src="assets/img/bromo.jpg" alt="Hamparan sabana Oro-oro Ombo dengan bunga Verbena ungu"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="animation-target">
                        <h2 class="h2">Pesona Sabana Oro-oro Ombo</h2>
                        <p class="p">
                            Setelah melewati Tanjakan Cinta, mata dimanjakan oleh lembah luas berwarna ungu dari bunga
                            Verbena. Sebuah pemandangan yang terasa seperti di negeri dongeng.
                        </p>
                    </div>
                </div>
            </section>

        </div>
    </div>

    <!-- Seksi Jadwal: tambahkan varian dark -->
    <section id="jadwal-trip" class="bg-slate-50 py-20 sm:py-24 transition-colors">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="h2 text-slate-900">Jadwal Open Trip Mendatang</h2>
                <p class="p text-slate-800">Pilih petualangan Anda berikutnya. Tempat terbatas!</p>
            </div>

            <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">

                @forelse ($upcomingTrips as $trip)
                    <a href="{{ route('opentrip.detail', $trip->slug) }}"
                        class="block rounded-xl border border-slate-200 bg-white transition-all duration-300 ease-in-out hover:-translate-y-2 hover:shadow-xl overflow-hidden">
                        <div class="relative h-56 w-full">
                            <img src="{{ asset('storage/' . $trip->image_path) }}" alt="Pemandangan {{ $trip->name }}"
                                class="absolute inset-0 w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 p-4 text-white">
                                <h3 class="h3 text-white">{{ $trip->name }}</h3>
                                <p class="p text-white text-sm font-medium">{{ $trip->start_date->format('d M') }} -
                                    {{ $trip->end_date->format('d M Y') }}</p>
                            </div>
                        </div>
                        <div class="p-5">
                            <div
                                class="flex justify-between items-center text-sm mb-4 text-slate-600">
                                <span>{{ $trip->duration }}</span>
                                <span>Sisa {{ $trip->slot - $trip->booked }} slot</span>
                            </div>
                            <div class="space-y-1 text-sm text-slate-700">
                                <p><strong>Level:</strong> <span class="capitalize">{{ $trip->difficulty }}</span></p>
                                <p><strong>Ketinggian:</strong> {{ $trip->altitude }}</p>
                                <p><strong>Harga:</strong> Rp{{ number_format($trip->price) }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-1 lg:col-span-3 text-center py-12">
                        <p class="text-slate-500">Belum ada jadwal trip mendatang. Silakan cek
                            kembali nanti!</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-16 text-center">
                <a href="{{ route('opentrip.index') }}" class="btn btn-primary">
                    Lihat Semua Jadwal
                </a>
            </div>
        </div>
    </section>

    {{-- Pastikan footer Anda dipanggil setelah section ini --}}
    <div class="footer">
        @include('components.footer')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sections = document.querySelectorAll('.scroll-section');
            const scrollContainer = document.querySelector('.scroll-container');
            let lastActiveIndex = -1;
            if (!scrollContainer || sections.length === 0) return;

            const scrollMultiplier = 75;
            scrollContainer.style.height = `${sections.length * 100}vh`;

            const activateSection = (index) => {
                if (index === lastActiveIndex) return;
                sections.forEach((section, i) => {
                    const textTarget = section.querySelector('.animation-target');
                    if (i === index) {
                        section.classList.add('is-active');
                        if (textTarget) textTarget.classList.add('is-visible');
                    } else {
                        section.classList.remove('is-active');
                        if (textTarget) textTarget.classList.remove('is-visible');
                    }
                });
                lastActiveIndex = index;
            };

            const handleScroll = () => {
                const containerTop = scrollContainer.offsetTop;
                const scrollPosition = window.scrollY;
                const windowHeight = window.innerHeight;
                const scrollAmount = scrollPosition - containerTop;
                if (scrollAmount < 0) {
                    activateSection(-1);
                    return;
                }
                const stepHeight = windowHeight * (scrollMultiplier / 100);
                let activeIndex = Math.floor(scrollAmount / stepHeight);
                if (activeIndex >= sections.length) activeIndex = sections.length - 1;
                activateSection(activeIndex);
            };

            window.addEventListener('scroll', handleScroll, {
                passive: true
            });
            handleScroll();
        });
    </script>

</body>

</html>
