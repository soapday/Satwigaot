@extends('layouts.admin')
@section('title', 'Peserta untuk ' . $trip->name)

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.trips.index') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold text-sm">&larr;
            Kembali ke Daftar Trip</a>
        <h1 class="text-2xl font-bold mt-2">Daftar Peserta: {{ $trip->name }}</h1>
        <p class="text-slate-600">Total: {{ $trip->booked }} dari {{ $trip->slot }} slot terisi.</p>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="bg-slate-100">
                    <th
                        class="px-5 py-3 border-b-2 border-slate-200 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                        Nama Peserta</th>
                    <th
                        class="px-5 py-3 border-b-2 border-slate-200 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                        Email Pemesan</th>
                    <th
                        class="px-5 py-3 border-b-2 border-slate-200 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                        No. KTP</th>
                    <th
                        class="px-5 py-3 border-b-2 border-slate-200 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                        No. Telepon</th>
                    <th
                        class="px-5 py-3 border-b-2 border-slate-200 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                        Riwayat Penyakit</th>
                    <th
                        class="px-5 py-3 border-b-2 border-slate-200 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                        Disabilitas</th>
                    <th
                        class="px-5 py-3 border-b-2 border-slate-200 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                        Status</th>
                    <th
                        class="px-5 py-3 border-b-2 border-slate-200 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                        Aksi</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($trip->bookings as $booking)
                    @foreach ($booking->participant_details as $participant)
                        <tr>
                            <td class="px-5 py-4 border-b border-slate-200 text-sm font-semibold bg-white">
                                {{ $participant['name'] }}</td>
                            <td class="px-5 py-4 border-b border-slate-200 text-sm text-slate-600 bg-white">
                                {{ $booking->user->email }}</td>
                            <td class="px-5 py-4 border-b border-slate-200 text-sm text-slate-600 bg-white">
                                {{ $participant['ktp'] ?? '-' }}</td>
                            <td class="px-5 py-4 border-b border-slate-200 text-sm text-slate-600 bg-white">
                                {{ $participant['phone'] ?? '-' }}</td>
                            <td class="px-5 py-4 border-b border-slate-200 text-sm text-slate-600 bg-white">
                                {{ $participant['medical_history'] ?? '-' }}</td>
                            <td class="px-5 py-4 border-b border-slate-200 text-sm text-slate-600 bg-white capitalize">
                                {{-- Check if the 'is_disabled' key exists and its value --}}
                                @if (isset($participant['is_disabled']) && $participant['is_disabled'] === 'ya')
                                    <span class="font-semibold text-red-600">Ya</span>
                                    ({{ $participant['disability_type'] ?? 'N/A' }})
                                @else
                                    Tidak
                                @endif
                            </td>
                            <td class="px-5 py-4 border-b border-slate-200 text-sm bg-white">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight rounded-full capitalize
                                @if ($booking->status == 'success') bg-green-100 text-green-800
                                @else bg-yellow-100 text-yellow-800 @endif">
                                    {{ $booking->status }}
                                </span>
                            </td>
                            <td class="px-5 py-4 border-b border-slate-200 text-sm bg-white">
                                @if ($booking->status == 'pending')
                                    <form action="{{ route('admin.bookings.confirm', $booking) }}" method="POST"
                                        onsubmit="return confirm('Anda yakin ingin mengonfirmasi pembayaran ini?');">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="font-semibold text-green-600 hover:text-green-900">Konfirmasi</button>
                                    </form>
                                @else
                                    <span class="text-slate-400">Terkonfirmasi</span>
                                @endif
                            </td>
                        </tr>
                        <tr x-show="open" x-transition>
                            <td colspan="5" class="p-0">
                                <div class="p-4 bg-slate-50">
                                    <h4 class="font-bold mb-2">Detail Peserta:</h4>
                                    <ul class="list-disc list-inside space-y-1 text-sm">
                                        @foreach ($booking->participant_details as $participant)
                                            <li>
                                                <strong>{{ $participant['name'] }}</strong> - KTP:
                                                {{ $participant['ktp'] }}
                                                @if (!empty($participant['medical_history']))
                                                    <span class="text-red-600">(Penyakit:
                                                        {{ $participant['medical_history'] }})</span>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-10 text-slate-500">Belum ada peserta untuk trip ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
