@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-center">Detail Reservasi</h1>

<div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl mx-auto">
    <div class="grid grid-cols-2 gap-y-3 text-sm">
        <p class="text-gray-500">User</p>
        <p class="font-semibold text-gray-800">{{ $reservasi->user->nama }}</p>

        <p class="text-gray-500">Studio</p>
        <p class="font-semibold text-gray-800">{{ $reservasi->studio->nama_studio }}</p>

        <p class="text-gray-500">Jadwal</p>
        <p class="font-semibold text-gray-800">
            {{ \Carbon\Carbon::createFromFormat('H:i:s', $reservasi->jadwal->jam_dimulai)->format('H:i') }} -
            {{ \Carbon\Carbon::createFromFormat('H:i:s', $reservasi->jadwal->jam_selesai)->format('H:i') }}
        </p>

        <p class="text-gray-500">Tanggal Reservasi</p>
        <p class="font-semibold text-gray-800">
            {{ $reservasi->created_at->format('d-m-Y') }}
        </p>

        <p class="text-gray-500">Total Biaya</p>
        <p class="font-semibold text-green-600">
            Rp {{ number_format($reservasi->total_biaya) }}
        </p>
    </div>

    <hr class="my-6 border-gray-300">

    <form action="{{ route('admin.reservasi.update', $reservasi->id) }}"
          method="POST">
        @csrf
        @method('PUT')

        <p class="block mb-2 text-sm text-gray-700">Status Reservasi</p>
        <p>
            <span class="px-3 py-1 rounded-full text-xs font-semibold
                @if($reservasi->status == 'pending') bg-yellow-100 text-yellow-800
                @elseif($reservasi->status == 'dibayar') bg-blue-100 text-blue-800
                @elseif($reservasi->status == 'selesai') bg-green-100 text-green-800
                @elseif($reservasi->status == 'batal') bg-red-100 text-red-800
                @else bg-gray-100 text-gray-800 @endif">
                {{ strtoupper($reservasi->status) }}
            </span>
        </p>

        @if(!in_array($reservasi->status, ['batal', 'selesai']))
            <input type="hidden" name="status" value="batal">
        @endif

        <div class="flex justify-between mt-6">
            <a href="{{ route('admin.reservasi.index') }}"
               class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-200">
                Kembali
            </a>

            @if(!in_array($reservasi->status, ['batal', 'selesai']))
                <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">
                    Batalkan Reservasi
                </button>
            @endif
        </div>
    </form>
</div>
@endsection
