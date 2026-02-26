<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Private Trip - Satwiga Tour</title>
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
        <img src="{{ asset('assets/img/labuan.jpg') }}" alt="Pemandangan indah untuk private trip"
            class="absolute inset-0 w-full h-full object-cover -z-10 brightness-50">
        <div class="relative h-full flex items-center justify-center text-center">
            <div class="max-w-4xl mx-auto px-6 lg:px-8">
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl">Rencanakan Private Trip
                    Eksklusif Anda</h1>
                <p class="mt-4 text-lg max-w-xl text-gray-200 mx-auto">Tentukan destinasi, jadwal, dan rekan perjalanan
                    Anda sendiri. Kami wujudkan petualangan impian Anda.</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto max-w-6xl py-16 px-4 sm:py-24">
        <div class="bg-white p-6 sm:p-10 rounded-2xl shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <a href="/customprivatetrip" class="md:col-span-2 group relative rounded-xl overflow-hidden shadow-lg transition-all duration-300 ease-in-out hover:shadow-2xl">
        <div class="h-80 w-full">
            <img src="{{ asset('assets/img/bromo.jpg') }}" alt="Peta dan kompas untuk merencanakan perjalanan" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-8 text-white">
            <h3 class="text-3xl font-bold">Buat Rencana Perjalanan Kustom Anda</h3>
            <p class="mt-2 text-gray-200 max-w-lg">Tidak menemukan destinasi impian? Rancang private trip eksklusif sesuai keinginan Anda bersama kami.</p>
            <span class="mt-4 inline-block font-semibold text-white border-b-2 border-green-400 hover:text-green-300 transition-colors">Isi Formulir Rencana &rarr;</span>
        </div>
    </a>
                <div id="trip-rinjani"
                    class="group bg-white rounded-xl overflow-hidden shadow-lg transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-1">
                    <div class="h-56 w-full overflow-hidden">
                        <img id="img-rinjani" src="" alt="Gunung Rinjani"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="p-6">
                        <p id="location-rinjani" class="text-xs font-semibold uppercase text-blue-500"></p>
                        <h3 id="title-rinjani" class="text-2xl font-bold text-gray-900 mt-1"></h3>
                        <p id="desc-rinjani" class="mt-2 text-gray-600 text-sm"></p>
                        <div class="mt-4 border-t pt-4">
                            <a href="#"
                                class="font-semibold text-blue-600 hover:text-blue-800 transition-colors">Rencanakan
                                Trip &rarr;</a>
                        </div>
                    </div>
                </div>

                <div id="trip-komodo"
                    class="group bg-white rounded-xl overflow-hidden shadow-lg transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-1">
                    <div class="h-56 w-full overflow-hidden">
                        <img id="img-komodo" src="" alt="Labuan Bajo"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="p-6">
                        <p id="location-komodo" class="text-xs font-semibold uppercase text-green-500"></p>
                        <h3 id="title-komodo" class="text-2xl font-bold text-gray-900 mt-1"></h3>
                        <p id="desc-komodo" class="mt-2 text-gray-600 text-sm"></p>
                        <div class="mt-4 border-t pt-4">
                            <a href="/customprivatetrip"
                                class="font-semibold text-green-600 hover:text-green-800 transition-colors">Rencanakan
                                Trip &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')

    <script src="{{ asset('js/privatetripdata.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Loop melalui setiap data trip dan isi ke dalam elemen HTML yang sesuai
            Object.values(allPrivateTrips).forEach(trip => {
                // Cari elemen-elemen untuk trip saat ini berdasarkan ID
                const titleEl = document.getElementById(`title-${trip.id}`);
                const locationEl = document.getElementById(`location-${trip.id}`);
                const descEl = document.getElementById(`desc-${trip.id}`);
                const imgEl = document.getElementById(`img-${trip.id}`);

                // Isi data jika elemen ditemukan
                if (titleEl) titleEl.textContent = trip.title;
                if (locationEl) locationEl.textContent = trip.location;
                if (descEl) descEl.textContent = trip.description;
                if (imgEl) imgEl.src = trip.image;
            });
        });
    </script>

</body>

</html>
