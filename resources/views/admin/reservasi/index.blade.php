@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h1 class="text-2xl font-bold">Data Reservasi & Riwayat Reservasi</h1>
    
</div>

<div class="bg-white rounded-lg overflow-x-auto shadow">
    <table class="w-full text-sm text-center">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3 text-gray-700">User</th>
                <th class="p-3 text-gray-700">Studio</th>
                <th class="p-3 text-gray-700">Tanggal</th>
                <th class="p-3 text-gray-700">Jam</th>

                <th class="p-3 text-gray-700">Total</th>
                <th class="p-3 text-gray-700">Status</th>
                <th class="p-3 text-gray-700">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reservasi as $r)
            <tr class="border-b border-gray-200">
                <td class="p-2 text-gray-800">{{ $r->user->nama ?? '-' }}</td>
                <td class="p-2 text-gray-800">{{ $r->studio->nama_studio ?? '-' }}</td>
                <td class="p-2 text-gray-800">{{ $r->created_at->format('d-m-Y') }}</td>
                <td class="p-2 text-gray-800">
                    {{ optional($r->jadwal)->jam_dimulai }} - {{ optional($r->jadwal)->jam_selesai }}
                </td>
                <td class="p-2 text-gray-800">Rp {{ number_format($r->total_biaya) }}</td>
                <td class="p-2">
                    <span class="px-2 py-1 rounded text-xs
                        @if($r->status == 'pending') bg-yellow-300 text-yellow-800
                        @elseif($r->status == 'dibayar') bg-blue-300 text-blue-800
                        @elseif($r->status == 'selesai') bg-green-300 text-green-800
                        @elseif($r->status == 'batal') bg-red-300 text-red-800
                        @else bg-gray-300 text-gray-800 @endif">
                        {{ $r->status }}
                    </span>
                </td>
                <td class="p-2 flex justify-center items-center gap-1">
                    <a href="{{ route('admin.reservasi.show', $r->id) }}"
                       class="bg-blue-600 px-3 py-1 rounded text-xs text-white hover:bg-blue-700">
                        Detail
                    </a>

                    @if($r->status == 'dibayar')
                        <form action="{{ route('admin.reservasi.selesai', $r->id) }}" method="POST" onsubmit="return confirm('Selesaikan sesi ini secara manual? Jadwal akan dibuka kembali agar bisa dibooking orang lain.')">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="bg-green-600 px-3 py-1 rounded text-xs text-white hover:bg-green-700" title="Selesaikan sesi lebih awal">
                                Selesai
                            </button>
                        </form>
                    @endif
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="7" class="p-3 text-gray-700">Tidak ada data reservasi</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
