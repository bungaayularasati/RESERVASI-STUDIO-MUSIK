@extends('layouts.admin')

@section('content')
<div class="p-4">

    <div class="flex justify-between items-center mb-4">
        <div>
            <h1 class="text-2xl font-bold">Jadwal Reservasi</h1>
        
        </div>


    </div>

    <div class="bg-white p-4 rounded-lg shadow max-w-4xl mx-auto">

        <table class="w-full text-gray-800 text-sm">
            <thead class="bg-gray-100 text-gray-700 text-xs uppercase tracking-wider">
                <tr>
                    <th class="p-2 w-12 text-center">No</th>
                    <th class="p-2 w-2 text-center">Studio</th>
                    <th class="p-2 w-20 text-center">Tanggal</th>
                    <th class="p-2 w-20 text-center">Jam Mulai</th>
                    <th class="p-2 w-20 text-center">Jam Selesai</th>
                    <th class="p-2 w-20 text-center">Status</th>
                    <th class="p-2 w-20 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal as $item)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="p-2 text-center">{{ $item->id }}</td>
                    <td class="p-2 text-center">{{ $item->studio->nama_studio }}</td>
                    <td class="p-2 text-center">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d-m-Y') }}</td>
                    <td class="p-2 text-center">{{ \Carbon\Carbon::parse($item->jam_dimulai)->format('H:i') }}</td>
                    <td class="p-2 text-center">{{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}</td>
                    <td class="p-2 text-center">
                        <span class="px-2 py-1 rounded text-white
                            {{ $item->status === 'kosong' ? 'bg-green-600' : 'bg-red-600' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td class="p-2 flex gap-2 justify-center">
                        <form action="{{ route('admin.jadwal.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')"
                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if($jadwal->isEmpty())
                <tr>
                    <td colspan="7" class="p-3 text-center text-gray-500">Tidak ada data jadwal</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

</div>
@endsection
