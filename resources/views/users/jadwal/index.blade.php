@extends('layouts.user')

@section('content')
<h1 class="text-2xl font-bold mb-4">
    Jadwal Studio {{ $studio->nama_studio }}
</h1>

<div class="bg-gray-800 rounded-lg overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-700">
            <tr>
                <th class="p-3">Tanggal</th>
                <th class="p-3">Jam</th>
                <th class="p-3">Status</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwal as $j)
            <tr class="border-b border-gray-700">
                <td class="p-2 text-center">{{ date('d-m-Y', strtotime($j->tanggal)) }}</td>
                <td class="p-2 text-center">
    {{ \Carbon\Carbon::parse($j->jam_dimulai)->format('H:i') }}
    -
    {{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }}
</td>

                <td class="p-2 text-center">
                    @if($j->status == 'kosong')
                        <span class="text-green-400">Kosong</span>
                    @else
                        <span class="text-red-400">Booked</span>
                    @endif
                </td>
                <td class="p-2 text-center">
                    @if($j->status == 'kosong')
                        <a href="{{ route('users.reservasi.create', $studio->id) }}"
                           class="bg-blue-600 px-3 py-1 rounded text-white">
                           Pesan
                        </a>
                    @else
                        <span class="text-gray-500">Tidak tersedia</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
