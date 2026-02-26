@extends('layouts.admin')
@section('title', 'Tambah Trip Baru')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Tambah Trip Baru</h1>

    <div class="bg-white p-8 rounded-xl shadow-md">
        <script>
            function generateSlug(source) {
                const slug = source.value
                    .toLowerCase()
                    .replace(/[^a-z0-9 -]/g, '') // Hapus karakter aneh
                    .replace(/\s+/g, '-') // Ganti spasi dengan -
                    .replace(/-+/g, '-'); // Ganti -- dengan -
                document.getElementById('slug').value = slug;
            }
        </script>

        <form action="{{ route('admin.trips.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Menampilkan semua error validasi di bagian atas --}}
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

            {{-- Nama & Slug --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-slate-700">Nama Trip (Gunung)</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                        onkeyup="generateSlug(this)" required
                        class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                </div>
                <div>
                    <label for="slug" class="block text-sm font-medium text-slate-700">Slug (URL)</label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug') }}" required
                        class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500 bg-slate-50">
                </div>
            </div>

            {{-- Rute & Provinsi --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="route" class="block text-sm font-medium text-slate-700">Rute (Via)</label>
                    <input type="text" id="route" name="route" value="{{ old('route') }}" required
                        class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                </div>
                <div>
                    <label for="province" class="block text-sm font-medium text-slate-700">Provinsi</label>
                    <input type="text" id="province" name="province" value="{{ old('province') }}" required
                        class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                </div>
            </div>

            {{-- Ketinggian & Durasi --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="altitude" class="block text-sm font-medium text-slate-700">Ketinggian (mdpl)</label>
                    <input type="text" id="altitude" name="altitude" value="{{ old('altitude') }}" required
                        class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                </div>
                <div>
                    <label for="duration" class="block text-sm font-medium text-slate-700">Durasi</label>
                    <input type="text" id="duration" name="duration" value="{{ old('duration') }}" required
                        placeholder="Contoh: 3 Hari 2 Malam"
                        class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                </div>
            </div>

            {{-- Kesulitan & Slot --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="difficulty" class="block text-sm font-medium text-slate-700">Level Kesulitan</label>
                    <select id="difficulty" name="difficulty" required
                        class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                        <option value="mudah" @if (old('difficulty') == 'mudah') selected @endif>Mudah</option>
                        <option value="sedang" @if (old('difficulty') == 'sedang') selected @endif>Sedang</option>
                        <option value="sulit" @if (old('difficulty') == 'sulit') selected @endif>Sulit</option>
                    </select>
                </div>
                <div>
                    <label for="slot" class="block text-sm font-medium text-slate-700">Jumlah Slot</label>
                    <input type="number" id="slot" name="slot" value="{{ old('slot') }}" required
                        class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                </div>
            </div>

            {{-- Tanggal Mulai & Selesai --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="start_date" class="block text-sm font-medium text-slate-700">Tanggal Mulai</label>
                    <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" required
                        class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                </div>
                <div>
                    <label for="end_date" class="block text-sm font-medium text-slate-700">Tanggal Selesai</label>
                    <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" required
                        class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                </div>
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-slate-700">Status Awal Trip</label>
                <select id="status" name="status" required
                    class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="coming_soon" @if (old('status') == 'coming_soon') selected @endif>Segera Hadir
                        (Disembunyikan)</option>
                    <option value="available" @if (old('status') == 'available') selected @endif>Tersedia (Langsung Buka
                        Pendaftaran)</option>
                </select>
                @error('status')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Harga --}}
            <div>
                <label for="price" class="block text-sm font-medium text-slate-700">Harga</label>
                <input type="number" id="price" name="price" value="{{ old('price') }}" required
                    placeholder="Contoh: 950000"
                    class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
            </div>

            {{-- Gambar --}}
            <div>
                <label for="image" class="block text-sm font-medium text-slate-700">Gambar Utama</label>
                <input type="file" id="image" name="image" required
                    class="mt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
            </div>

            <div>
                <label for="gallery" class="block text-sm font-medium text-slate-700">Galeri Gambar (Bisa pilih
                    banyak)</label>
                <input type="file" id="gallery" name="gallery[]" multiple
                    class="mt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
            </div>

            <div class="flex justify-end gap-4 pt-4 border-t">
                <a href="{{ route('admin.trips.index') }}"
                    class="px-4 py-2 bg-slate-200 text-slate-800 rounded-lg hover:bg-slate-300">Batal</a>
                <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Simpan</button>
            </div>
        </form>
    </div>
@endsection
