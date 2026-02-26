    @extends('layouts.admin')
    @section('title', 'Edit Trip: ' . $trip->name)

    @section('content')
        <h1 class="text-2xl font-bold mb-6">Edit Trip: {{ $trip->name }}</h1>

        <div class="bg-white p-8 rounded-xl shadow-md">
            <script>
                function generateSlug(source) {
                    const slug = source.value.toLowerCase().replace(/[^a-z0-9 -]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-');
                    document.getElementById('slug').value = slug;
                }
            </script>

            <form action="{{ route('admin.trips.update', $trip->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="bg-red-50 text-red-700 border border-red-200 p-4 rounded-lg">
                        <p class="font-bold">Harap perbaiki error berikut:</p>
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-slate-700">Nama Trip (Gunung)</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $trip->title) }}"
                            onkeyup="generateSlug(this)" required
                            class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>
                    <div>
                        <label for="slug" class="block text-sm font-medium text-slate-700">Slug (URL)</label>
                        <input type="text" id="slug" name="slug" value="{{ old('slug', $trip->slug) }}" required
                            class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500 bg-slate-50">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="route" class="block text-sm font-medium text-slate-700">Rute (Via)</label>
                        <input type="text" id="route" name="route" value="{{ old('route', $trip->route) }}"
                            required
                            class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>
                    <div>
                        <label for="province" class="block text-sm font-medium text-slate-700">Provinsi</label>
                        <input type="text" id="province" name="province" value="{{ old('province', $trip->province) }}"
                            required
                            class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="altitude" class="block text-sm font-medium text-slate-700">Ketinggian (mdpl)</label>
                        <input type="text" id="altitude" name="altitude" value="{{ old('altitude', $trip->altitude) }}"
                            required
                            class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>
                    <div>
                        <label for="duration" class="block text-sm font-medium text-slate-700">Durasi</label>
                        <input type="text" id="duration" name="duration" value="{{ old('duration', $trip->duration) }}"
                            required placeholder="Contoh: 3 Hari 2 Malam"
                            class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="difficulty" class="block text-sm font-medium text-slate-700">Level Kesulitan</label>
                        <select id="difficulty" name="difficulty" required
                            class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                            <option value="mudah" @if (old('difficulty', $trip->difficulty) == 'mudah') selected @endif>Mudah</option>
                            <option value="sedang" @if (old('difficulty', $trip->difficulty) == 'sedang') selected @endif>Sedang</option>
                            <option value="sulit" @if (old('difficulty', $trip->difficulty) == 'sulit') selected @endif>Sulit</option>
                        </select>
                    </div>
                    <div>
                        <label for="slot" class="block text-sm font-medium text-slate-700">Jumlah Slot</label>
                        <input type="number" id="slot" name="slot" value="{{ old('slot', $trip->slot) }}" required
                            class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-slate-700">Tanggal Mulai</label>
                        <input type="date" id="start_date" name="start_date"
                            value="{{ old('start_date', $trip->start_date->format('Y-m-d')) }}" required
                            class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>
                    <div>
                        <label for="end_date" class="block text-sm font-medium text-slate-700">Tanggal Selesai</label>
                        <input type="date" id="end_date" name="end_date"
                            value="{{ old('end_date', $trip->end_date->format('Y-m-d')) }}" required
                            class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-slate-700">Harga</label>
                    <input type="number" id="price" name="price" value="{{ old('price', $trip->price) }}" required
                        placeholder="Contoh: 950000"
                        class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                </div>

                <div>
                    <label for="image_path" class="block text-sm font-medium text-slate-700">Ganti Gambar Utama
                        (Opsional)</label>
                    <input type="file" id="image_path" name="image_path"
                        class="mt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                    <p class="text-xs text-slate-500 mt-2">Gambar saat ini:</p>
                    <img src="{{ asset('storage/' . $trip->image_path) }}" alt="{{ $trip->name }}"
                        class="mt-2 h-24 w-auto rounded">
                </div>


                <div>
                    <label for="gallery" class="block text-sm font-medium text-slate-700">Galeri Gambar (Bisa pilih
                        banyak)</label>
                    <input type="file" id="gallery" name="gallery[]" multiple
                        class="mt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-slate-700">Status Trip</label>
                    <select id="status" name="status"
                        class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                        <option value="coming_soon" @if ($trip->status == 'coming_soon') selected @endif>Segera Hadir</option>
                        <option value="available" @if ($trip->status == 'available') selected @endif>Tersedia (Buka
                            Pendaftaran)
                        </option>
                        <option value="full" @if ($trip->status == 'full') selected @endif>Penuh</option>
                        <option value="ongoing" @if ($trip->status == 'ongoing') selected @endif>Berjalan</option>
                        <option value="finished" @if ($trip->status == 'finished') selected @endif>Selesai</option>
                    </select>
                </div>

                <div class="flex justify-end gap-4 pt-4 border-t">
                    <a href="{{ route('admin.trips.index') }}"
                        class="px-4 py-2 bg-slate-200 text-slate-800 rounded-lg hover:bg-slate-300">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Simpan
                        Perubahan</button>
                </div>
            </form>
        </div>
    @endsection
