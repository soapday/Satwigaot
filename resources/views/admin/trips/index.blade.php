@extends('layouts.admin')
@section('title', 'Kelola Trip')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Trip</h1>
        <a href="{{ route('admin.trips.create') }}"
            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Tambah Trip Baru</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="bg-slate-100">
                    <th
                        class="px-5 py-3 border-b-2 border-slate-200 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                        Nama Trip</th>
                    <th
                        class="px-5 py-3 border-b-2 border-slate-200 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                        Peserta</th>
                    <th class="px-5 py-3 border-b-2 border-slate-200 text-left text-xs font-semibold">Status</th>
                    <th
                        class="px-5 py-3 border-b-2 border-slate-200 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                        Harga</th>
                    <th class="px-5 py-3 border-b-2 border-slate-200"></th>
                    <th
                        class="px-5 py-3 border-b-2 border-slate-200 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                        Status</th>
                    <th
                        class="px-5 py-3 border-b-2 border-slate-200 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                        Aksi</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($trips as $trip)
                    <tr>
                        <td class="px-5 py-5 border-b border-slate-200 text-sm">
                            <p class="font-semibold">{{ $trip->name }}</p>
                            <p class="text-xs text-slate-500">{{ $trip->route }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-slate-200 text-sm">
                            {{-- LINK BARU KE HALAMAN DETAIL PESERTA --}}
                            <a href="{{ route('admin.trips.bookings.index', $trip) }}"
                                class="font-semibold text-green-600 hover:underline">
                                {{ $trip->booked }} / {{ $trip->slot }} Peserta
                            </a>
                        </td>
                        <td class="px-5 py-5 border-b border-slate-200 text-sm">
                            <span
                                class="px-2 py-1 font-semibold leading-tight rounded-full capitalize
                @if ($trip->status == 'available') bg-green-100 text-green-800
                @elseif($trip->status == 'coming_soon') bg-blue-100 text-blue-800
                @elseif($trip->status == 'full') bg-orange-100 text-orange-800
                @elseif($trip->status == 'ongoing') bg-yellow-100 text-yellow-800
                @else bg-slate-200 text-slate-600 @endif">
                                {{ str_replace('_', ' ', $trip->status) }}
                            </span>
                        </td>
                        <td class="px-5 py-4 border-b border-slate-200 text-sm bg-white">
                            <span
                                class="px-2 py-1 font-semibold leading-tight rounded-full capitalize
                                @if ($trip->status == 'success') bg-green-100 text-green-800
                                @else bg-yellow-100 text-yellow-800 @endif">
                                {{ $trip->status }}
                            </span>
                        </td>
                        <td class="px-5 py-4 border-b border-slate-200 text-sm bg-white">
                            @if ($trip->status == 'pending')
                                <form action="{{ route('admin.bookings.confirm', $trip) }}" method="POST" onsubmit="return confirm('Anda yakin ingin mengonfirmasi pembayaran ini?');">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="text-green-600 hover:text-green-900 font-semibold">Konfirmasi</button>
                                </form>
                            @else
                                <span class="text-slate-400">Terkonfirmasi</span>
                            @endif
                        </td>
                        <td class="px-5 py-5 border-b border-slate-200 text-sm">Rp{{ number_format($trip->price) }}</td>
                        <td class="px-5 py-5 border-b border-slate-200 text-sm text-right">
                            <a href="{{ route('admin.trips.edit', $trip) }}"
                                class="text-green-600 hover:text-green-900">Edit</a>
                            <form action="{{ route('admin.trips.destroy', $trip) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('Anda yakin ingin menghapus trip ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{ $trips->links() }}
    </div>
@endsection
