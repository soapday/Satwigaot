<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reservasi Open Trip - Satwiga Tour</title>

    <!-- === INIT THEME (no flicker) === -->
    <script>
        (function() {
            const theme = localStorage.getItem("theme");
            const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
            const isDark = theme === "dark" || (!theme && prefersDark);
            document.documentElement.classList.toggle("dark", isDark);
            document.documentElement.dataset.theme = isDark ? "dark" : "light";
        })();
    </script>

    <!-- === Tailwind CDN Config (satu kali) === -->
    <script>
        window.tailwind = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#1D5CA8",
                        primaryDark: "#0F3C75",
                        accent: "#F7B500",
                        softGray: "#F4F6F8",
                        neutralBlack: "#1A1A1A",
                    },
                    boxShadow: {
                        soft: "0 8px 24px rgba(0,0,0,0.08)"
                    },
                    borderRadius: {
                        xl2: "1rem"
                    },
                },
            },
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts & app.css -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    <!-- === Manual CSS (rapi & valid) === -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Panel terbalik:
       - Default (light mode): panel gelap
       - .dark (dark mode): panel terang */
        .panel-invert {
            background: #0f172a;
            /* dark navy */
            color: #e5e7eb;
            /* slate-200-ish */
            border: 1px solid #1f2937;
            /* slate-800 */
            border-radius: 16px;
            transition: background-color .3s, color .3s, border-color .3s;
        }

        .panel-invert .muted {
            color: #94a3b8;
        }

        /* slate-400 */

        /* Input & chip di dalam panel (default: versi gelap) */
        .panel-invert .input {
            background: #0b1220;
            color: #e5e7eb;
            border: 2px solid #334155;
            /* slate-700 */
            border-radius: 999px;
            padding: .5rem 1rem;
            transition: border-color .2s, box-shadow .2s, background-color .2s, color .2s;
        }

        .panel-invert .input::placeholder {
            color: #7c8aa3;
        }

        /* abu-abu kebiruan */
        .panel-invert .input:focus {
            outline: none;
            border-color: #1D5CA8;
            box-shadow: 0 0 0 3px rgba(29, 92, 168, .25);
        }

        .panel-invert .chip {
            background: transparent;
            color: #e5e7eb;
            border: 2px solid #334155;
            border-radius: 999px;
            padding: .5rem 1rem;
            font-weight: 600;
            transition: border-color .2s, background-color .2s, color .2s;
        }

        .panel-invert .chip.is-active {
            background: rgba(255, 255, 255, .06);
        }

        /* Saat DARK MODE → panel menjadi terang */
        .dark .panel-invert {
            background: #ffffff;
            color: #0f172a;
            border: 1px solid #e5e7eb;
            /* slate-200 */
        }

        .dark .panel-invert .muted {
            color: #475569;
        }

        /* slate-600 */

        .dark .panel-invert .input {
            background: #ffffff;
            color: #0f172a;
            border-color: #cbd5e1;
            /* slate-300 */
        }

        .dark .panel-invert .input::placeholder {
            color: #94a3b8;
        }

        .dark .panel-invert .chip {
            color: #0f172a;
            border-color: #cbd5e1;
            background: transparent;
        }

        .dark .panel-invert .chip.is-active {
            background: rgba(2, 6, 23, .06);
        }

        /* Kartu trip (ikut tema global dari app.css via CSS vars, tapi disediakan fallback manual juga) */
        .trip-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease, background-color .3s ease, color .3s ease;
        }

        .trip-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 40px rgba(2, 6, 23, .14);
            border-color: #1D5CA8;
        }

        .dark .trip-card {
            background: #0f172a;
            border-color: #1f2937;
            color: #e5e7eb;
        }

        /* Hero overlay tone */
        .hero-media .shade {
            position: absolute;
            inset: 0;
        }

        .hero-media .shade.light {
            background: rgba(0, 0, 0, .35);
        }

        .dark .hero-media .shade.light {
            background: rgba(0, 0, 0, .25);
        }

        /* Pagination tweak saat dark */
        .dark nav[role="navigation"] a,
        .dark nav[role="navigation"] span {
            color: #e5e7eb;
        }

        .dark nav[role="navigation"] .bg-white {
            background-color: #0f172a !important;
        }

        .dark nav[role="navigation"] .border-gray-300 {
            border-color: #334155 !important;
        }
    </style>
</head>

<body class="theme-anim bg-[var(--color-bg)] text-[var(--color-text)] transition-colors duration-300">

    {{-- NAVBAR (dengan tombol tema) --}}
    @include('components.navbar', ['isTransparent' => true])

    {{-- HERO --}}
    <div class="relative h-96 overflow-hidden hero-media">
        <img src="{{ asset('assets/img/ranukumbolo.jpg') }}" alt="Pemandangan gunung di Indonesia"
            class="absolute inset-0 w-full h-full object-cover" />
        <div class="shade light"></div>
        <div class="relative h-full flex items-center justify-center text-center">
            <div>
                <h1 class="h1 text-4xl sm:text-5xl text-white">Pesan Open Trip Anda</h1>
                <p class="mt-4 text-lg max-w-xl mx-auto text-slate-200">
                    Jelajahi keindahan alam Indonesia bersama petualang lainnya.
                </p>
            </div>
        </div>
    </div>

    {{-- CONTENT --}}
    <div class="container mx-auto max-w-5xl py-16 px-4 sm:py-24">
        <!-- panel-invert: gelap saat light, terang saat dark -->
        <div class="panel-invert shadow-lg p-6 sm:p-10">
            <div class="text-center">
                <h2 class="text-2xl font-bold mb-1">Menjelajah Bersama</h2>
                <p class="mb-8 muted">
                    Pilih salah satu jadwal yang tersedia untuk melanjutkan ke halaman pemesanan.
                </p>
            </div>

            {{-- FILTER & SEARCH --}}
            {{-- FILTER & SEARCH --}}
<form action="{{ route('opentrip.index') }}" method="GET">
  <div class="relative mb-8 max-w-lg mx-auto">
    <!-- ikon search -->
    <span class="absolute left-4 top-1/2 -translate-y-1/2 pointer-events-none">
      <svg class="w-5 h-5 text-slate-500"
           xmlns="http://www.w3.org/2000/svg" fill="none"
           viewBox="0 0 24 24" stroke-width="2"
           stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
      </svg>
    </span>

    <!-- input -->
    <input
      type="text"
        ="search"
      placeholder="Cari nama gunung..."
      value="{{ request('search') }}"
      autocomplete="off"
      class="w-full h-12 pl-12 pr-4 rounded-full border-2
             border-slate-200
             bg-[var(--color-surface)]
             text-slate-900
             placeholder-slate-400
             focus:outline-none focus:border-primary
             transition-colors duration-300"
    />
  </div>
</form>
            {{-- TRIP LIST --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse ($trips as $trip)
                    <a href="{{ route('opentrip.detail', $trip->slug) }}" class="trip-card rounded-xl overflow-hidden">
                        <div class="relative h-48 w-full">
                            <img src="{{ asset('storage/' . $trip->image_path) }}" alt="{{ $trip->title }}"
                                class="absolute inset-0 w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 p-4 text-white">
                                <h3 class="card-title text-xl font-bold">{{ $trip->title }}</h3>
                                <p class="text-sm font-medium">
                                    {{ $trip->start_date->format('d M') }} - {{ $trip->end_date->format('d M Y') }}
                                </p>
                            </div>
                        </div>

                        <div class="p-5">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-[var(--color-text-muted)]">{{ $trip->duration }}</span>
                                <span class="p-sisa font-semibold">Sisa {{ $trip->slot - $trip->booked }} slot</span>
                            </div>

                            <div class="mt-4 text-sm text-[var(--color-text-muted)]">
                                <p>
                                    <strong class="text-[var(--color-text)]">Level:</strong>
                                    <span class="capitalize">{{ $trip->difficulty }}</span>
                                </p>
                                <p>
                                    <strong class="text-[var(--color-text)]">Ketinggian:</strong>
                                    {{ $trip->altitude }}
                                    <span > mdpl</span>
                                </p>
                                <p>
                                    <strong class="text-[var(--color-text)]">Harga:</strong>
                                    <span class="font-bold text-[var(--color-text)]">
                                        Rp{{ number_format($trip->price) }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-1 md:col-span-2 text-center py-12">
                        <p class="text-[var(--color-text-muted)]">
                            Trip tidak ditemukan. Coba ubah kata kunci pencarian atau filter Anda.
                        </p>
                    </div>
                @endforelse
            </div>

            <div class="mt-12">
                {{ $trips->links() }}
            </div>
        </div>
    </div>

    @include('components.footer')

    <!-- Theme toggle handler (navbar button id=theme-toggle) -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const btn = document.getElementById("theme-toggle");
            const darkIcon = document.getElementById("theme-toggle-dark-icon");
            const lightIcon = document.getElementById("theme-toggle-light-icon");
            if (!btn) return;

            const setIcons = (isDark) => {
                darkIcon?.classList.toggle("hidden", isDark);
                lightIcon?.classList.toggle("hidden", !isDark);
            };

            let isDark = document.documentElement.classList.contains("dark");
            setIcons(isDark);

            btn.addEventListener("click", () => {
                isDark = !isDark;
                document.documentElement.classList.toggle("dark", isDark);
                document.documentElement.dataset.theme = isDark ? "dark" : "light";
                localStorage.setItem("theme", isDark ? "dark" : "light");
                setIcons(isDark);
            });
        });
    </script>
</body>

</html>
