@php
    // Navbar transparan di halaman hero?
    $isTransparent = $isTransparent ?? false;
@endphp

<nav id="navbar"
    class="fixed top-0 left-0 right-0 z-50 w-full flex items-center justify-between px-6 lg:px-8
    {{ $isTransparent
        ? 'bg-transparent text-white p-6 border-transparent transition-colors duration-300 ease-in-out'
        : 'bg-white text-slate-900 py-4 border-b border-slate-200 shadow-lg' }}">
    <a href="/" class="flex-shrink-0" aria-label="Beranda Satwiga">
        <img class="h-8 w-auto" src="/assets/img/fabu.png" alt="Satwiga Logo">
    </a>

    <div class="hidden lg:flex lg:gap-x-10 items-center">
        <a href="/"
            class="text-sm font-semibold uppercase tracking-wider transition-colors
                  {{ $isTransparent ? 'hover:text-gray-300' : 'hover:text-slate-600' }}">
            Beranda
        </a>

        {{-- Dropdown Reservasi --}}
        <div class="relative group">
            <button
                class="text-sm font-semibold uppercase tracking-wider flex items-center transition-colors focus:outline-none
                       {{ $isTransparent ? 'hover:text-gray-300' : 'hover:text-slate-600' }}">
                Reservasi
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div
                class="absolute left-0 mt-2 w-48 rounded-lg py-2 opacity-0 invisible transform scale-95
                       group-hover:opacity-100 group-hover:visible group-hover:scale-100 transition-all duration-200
                       bg-white text-gray-800 shadow-lg
                       border border-slate-200">
                <a href="/privatetrip" class="block px-4 py-2 text-sm hover:bg-gray-100">Private
                    Trip</a>
                <a href="/opentrip" class="block px-4 py-2 text-sm hover:bg-gray-100">Open
                    Trip</a>
                <a href="/sewaporter" class="block px-4 py-2 text-sm hover:bg-gray-100">Sewa
                    Porter</a>
            </div>
        </div>

        <a href="/paduantrip"
            class="text-sm font-semibold uppercase tracking-wider transition-colors
                  {{ $isTransparent ? 'hover:text-gray-300' : 'hover:text-slate-600' }}">
            Panduan & Tips
        </a>
        <a href="/cerita"
            class="text-sm font-semibold uppercase tracking-wider transition-colors
                  {{ $isTransparent ? 'hover:text-gray-300' : 'hover:text-slate-600' }}">
            Cerita Kita
        </a>


    </div>
    <div class="flex items-center gap-3">
        <button id="theme-toggle" type="button"
            class="inline-flex items-center justify-center rounded-full px-3 py-2 text-sm font-medium focus:outline-none focus:ring-2
             border border-slate-300 text-slate-700 bg-white
             hover:bg-slate-50 focus:ring-slate-400/50"
            aria-label="Ubah tema" title="Ubah tema">
            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
            </svg>
            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path
                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4.22 2.47a1 1 0 010 1.41l-.7.7a1 1 0 11-1.42-1.42l.7-.7a1 1 0 011.42 0zM17 9a1 1 0 100 2h1a1 1 0 100-2h-1zM4 9a1 1 0 100 2H3a1 1 0 100-2h1zm2.05 6.36a1 1 0 010-1.42l.7-.7a1 1 0 111.42 1.42l-.7.7a1 1 0 01-1.42 0zM10 17a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1z" />
            </svg>
            <span class="sr-only">Toggle tema</span>
        </button>

        {{-- Auth Desktop --}}
        <div class="hidden lg:flex items-center gap-x-4">
            @auth
                <div class="relative group">
                    <button
                        class="flex items-center gap-x-2 text-sm font-semibold transition-colors focus:outline-none
                           {{ $isTransparent ? 'hover:text-gray-300' : 'hover:text-slate-600' }}">
                        <img class="h-8 w-8 rounded-full border border-gray-300 bg-white object-cover"
                            src="/assets/img/user.jpg" alt="User Avatar">
                        <span>Halo, <span class="font-bold">{{ Auth::user()->name }}</span></span>
                        <svg class="w-4 h-4 group-hover:rotate-180 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        class="absolute right-0 mt-2 w-56 rounded-lg py-2 opacity-0 invisible transform scale-95
                           group-hover:opacity-100 group-hover:visible group-hover:scale-100 transition-all duration-200
                           bg-white text-gray-800 shadow-lg
                           border border-slate-200">
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('admin.dashboard') }}"
                                class="block px-4 py-2 text-sm font-semibold text-blue-900 hover:bg-gray-100">
                                Admin Dashboard
                            </a>
                            <div class="border-t border-gray-100 my-1"></div>
                        @endif
                        <a href="{{ route('pemesanan.show') }}"
                            class="block px-4 py-2 text-sm hover:bg-gray-100">Pesanan Saya</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                Logout
                            </a>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="text-sm font-semibold uppercase tracking-wider transition-colors
                      {{ $isTransparent ? 'hover:text-gray-300' : 'hover:text-slate-600' }}">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500
                      focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600
                      transition-colors">
                    Register
                </a>
            @endguest
        </div>

        {{-- Tombol Hamburger (Mobile) --}}
        <div class="lg:hidden">
            <button id="mobile-menu-button"
                class="inline-flex items-center justify-center p-2 rounded-md
                   {{ $isTransparent ? 'hover:bg-white/10 focus:ring-white/60' : 'hover:bg-slate-100 focus:ring-slate-400/50' }}
                   focus:outline-none focus:ring-2 focus:ring-inset"
                aria-controls="mobile-menu" aria-expanded="false">
                <span class="sr-only">Buka menu utama</span>
                <svg id="hamburger-icon" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
                <svg id="close-icon" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Panel Menu Mobile --}}
        <div id="mobile-menu"
            class="hidden lg:hidden absolute top-full left-0 w-full shadow-lg
                bg-white/95 text-gray-900 backdrop-blur-sm
                border-t border-slate-200">
            <div class="px-4 pt-2 pb-4 space-y-2">
                <a href="/"
                    class="block py-2 text-base font-semibold uppercase tracking-wider hover:text-green-600">Beranda</a>

                {{-- Dropdown Reservasi Mobile --}}
                <div>
                    <button id="reservasi-toggle-mobile"
                        class="w-full flex justify-between items-center py-2 text-base font-semibold uppercase tracking-wider hover:text-green-600">
                        Reservasi
                        <svg class="w-5 h-5 transition-transform" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="reservasi-submenu-mobile" class="hidden pl-4 mt-2 space-y-2">
                        <a href="/privatetrip"
                            class="block py-2 text-sm font-medium hover:text-green-600">Private
                            Trip</a>
                        <a href="/opentrip"
                            class="block py-2 text-sm font-medium hover:text-green-600">Open
                            Trip</a>
                        <a href="/sewaporter"
                            class="block py-2 text-sm font-medium hover:text-green-600">Sewa
                            Porter</a>
                    </div>
                </div>

                <a href="/paduantrip"
                    class="block py-2 text-base font-semibold uppercase tracking-wider hover:text-green-600">Panduan
                    & Tips</a>
                <a href="/cerita"
                    class="block py-2 text-base font-semibold uppercase tracking-wider hover:text-green-600">Cerita
                    Kita</a>

                <hr class="border-gray-300 my-4">

                {{-- Auth Mobile --}}
                @auth
                    <div class="flex items-center gap-x-3 pt-2">
                        <img class="h-10 w-10 rounded-full border border-gray-300 bg-white object-cover"
                            src="/assets/img/user.jpg" alt="User Avatar">
                        <div>
                            <p class="font-semibold">Halo, {{ Auth::user()->name }}</p>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <a href="{{ route('pemesanan.show') }}"
                            class="block px-3 py-2 rounded-md text-base font-medium hover:bg-gray-200">Pesanan
                            Saya</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-red-600 hover:bg-red-50">
                                Logout
                            </a>
                        </form>
                    </div>
                @else
                    <div class="flex items-center gap-x-4 pt-2">
                        <a href="{{ route('login') }}"
                            class="flex-1 text-center rounded-md border border-green-600 px-4 py-2 text-sm font-semibold text-green-600 hover:bg-green-50 transition-colors">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                            class="flex-1 text-center rounded-md bg-green-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 transition-colors">
                            Register
                        </a>
                    </div>
                @endguest
            </div>
        </div>
</nav>

{{-- SCRIPT --}}
<script>
    // ====== Theme toggle (ikon & state) ======
    const themeToggleBtn = document.getElementById('theme-toggle');
    const darkIcon = document.getElementById('theme-toggle-dark-icon');
    const lightIcon = document.getElementById('theme-toggle-light-icon');

    // Set ikon sesuai mode awal
    if (localStorage.theme === 'dark' ||
        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
        lightIcon?.classList.remove('hidden');
    } else {
        document.documentElement.classList.remove('dark');
        darkIcon?.classList.remove('hidden');
    }

    themeToggleBtn?.addEventListener('click', () => {
        darkIcon?.classList.toggle('hidden');
        lightIcon?.classList.toggle('hidden');
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.theme = 'light';
        } else {
            document.documentElement.classList.add('dark');
            localStorage.theme = 'dark';
        }
    });

    // ====== Navbar transparan → solid saat scroll (dengan varian dark) ======
    @if ($isTransparent)
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (!navbar) return;

            if (window.scrollY > 10) {
                // Solid state (light & dark)
                navbar.classList.add(
                    'bg-white', 'bg-opacity-95', 'backdrop-blur-sm', 'shadow-lg',
                    'text-slate-900', 'py-4',
                    'dark:bg-slate-900', 'dark:text-slate-100', 'dark:bg-opacity-95',
                    'dark:border-slate-800'
                );
                navbar.classList.remove('bg-transparent', 'text-white', 'p-6', 'border-transparent');
            } else {
                // Kembali transparan di atas hero
                navbar.classList.remove(
                    'bg-white', 'bg-opacity-95', 'backdrop-blur-sm', 'shadow-lg',
                    'text-slate-900', 'py-4',
                    'dark:bg-slate-900', 'dark:text-slate-100', 'dark:bg-opacity-95',
                    'dark:border-slate-800'
                );
                navbar.classList.add('bg-transparent', 'text-white', 'p-6', 'border-transparent');
            }
        });
    @endif

    // ====== Mobile menu ======
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const closeIcon = document.getElementById('close-icon');

    mobileMenuButton?.addEventListener('click', () => {
        const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
        mobileMenuButton.setAttribute('aria-expanded', String(!isExpanded));
        mobileMenu?.classList.toggle('hidden');
        hamburgerIcon?.classList.toggle('hidden');
        closeIcon?.classList.toggle('hidden');
    });

    // Dropdown "Reservasi" di mobile
    const reservasiToggleMobile = document.getElementById('reservasi-toggle-mobile');
    const reservasiSubmenuMobile = document.getElementById('reservasi-submenu-mobile');
    reservasiToggleMobile?.addEventListener('click', (e) => {
        e.preventDefault();
        reservasiSubmenuMobile?.classList.toggle('hidden');
        reservasiToggleMobile.querySelector('svg')?.classList.toggle('rotate-180');
    });
</script>
