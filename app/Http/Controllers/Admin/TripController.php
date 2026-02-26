<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        // Ganti Trip::all() atau Trip::latest()->get() menjadi paginate()
        // Angka 10 berarti menampilkan 10 data trip per halaman
        $trips = Trip::latest()->paginate(10);

        return view('admin.trips.index', compact('trips'));
    }

    public function create()
    {
        return view('admin.trips.create');
    }

    public function store(Request $request)
    {
        // 1. Daftarkan SEMUA input form ke dalam validasi
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'slug'       => 'required|string|max:255',
            'route'      => 'required|string',
            'province'   => 'required|string',
            'altitude'   => 'required|string',
            'duration'   => 'required|string',
            'difficulty' => 'required|string',
            'slot'       => 'required|integer',
            'start_date' => 'required|date',
            'end_date'   => 'required|date',
            'status'     => 'required|string',
            'price'      => 'required|numeric',
            // 'description' => 'required|string', // Aktifkan jika ada deskripsi
            'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. Proses Upload Gambar
        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('trips', 'public');
        }

        // Karena di form HTML namanya 'image', tapi di database 'image_path',
        // kita harus menghapus 'image' dari array agar database tidak bingung.
        unset($validated['image']);

        // 3. Simpan semua data sekaligus ke database
        Trip::create($validated);

        return redirect()->route('admin.trips.index')
            ->with('success', 'Trip berhasil ditambahkan');
    }

    public function edit(Trip $trip)
    {
        return view('admin.trips.edit', compact('trip'));
    }

    public function update(Request $request, Trip $trip)
    {
        $validated = $request->validate([
            'title'      => 'required|string',
            'route'      => 'required|string',
            'province'   => 'required|string',
            'altitude'   => 'required|string',
            'duration'   => 'required|string',
            'difficulty' => 'required|string',
            'slot'       => 'required|integer',
            'start_date' => 'required|date',
            'end_date'   => 'required|date',
            'status'     => 'required|string',
            'price'      => 'required|numeric',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('image')) {
          
            $validated['image_path'] = $request->file('image')->store('trips', 'public');
        }

        // Update slug jika judul berubah
        $validated['slug'] = \Illuminate\Support\Str::slug($request->title);

        // Hapus 'image' dari array agar tidak error saat update ke database
        unset($validated['image']);

        // 3. Simpan perubahan
        $trip->update($validated);

        return redirect()->route('admin.trips.index')
            ->with('success', 'Data trip berhasil diperbarui');
    }
}
