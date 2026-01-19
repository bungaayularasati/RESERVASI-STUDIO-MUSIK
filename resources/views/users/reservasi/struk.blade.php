@extends('layouts.user')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white text-gray-800 rounded-lg shadow-lg p-6">

    {{-- HEADER --}}
    <div class="text-center border-b pb-4 mb-4">
        <h1 class="text-xl font-bold uppercase">Struk Reservasi</h1>
        <p class="text-sm text-gray-500">Bukti Pembayaran Resmi</p>
    </div>

    {{-- INFO STUDIO --}}
    <div class="text-sm space-y-1 mb-4">
        <p class="font-semibold text-lg text-center">
            {{ $reservasi->studio->nama_studio }}
        </p>
        <p class="text-center text-gray-500">
            {{ $reservasi->studio->alamat ?? '—' }}
        </p>
    </div>

    <hr class="my-4">

    {{-- DETAIL RESERVASI (STRUK STYLE) --}}
    <div class="text-sm space-y-1 font-mono">
        <div class="grid grid-cols-[80px_10px_1fr]">
            <span>Nama</span>
            <span>:</span>
            <span>{{ Auth::user()->nama ?? Auth::user()->name }}</span>
        </div>

        <div class="grid grid-cols-[80px_10px_1fr]">
            <span>Tanggal</span>
            <span>:</span>
            <span>{{ date('d-m-Y', strtotime($reservasi->jadwal->tanggal)) }}</span>
        </div>

        <div class="grid grid-cols-[80px_10px_1fr]">
            <span>Jam</span>
            <span>:</span>
            <span>
                {{ substr($reservasi->jadwal->jam_dimulai,0,5) }} -
                {{ substr($reservasi->jadwal->jam_selesai,0,5) }}
            </span>
        </div>

        <div class="grid grid-cols-[80px_10px_1fr]">
            <span>Status</span>
            <span>:</span>
            <span class="font-semibold text-green-600">
                LUNAS
            </span>
        </div>
    </div>

    <hr class="my-4">

    {{-- TOTAL --}}
    <div class="grid grid-cols-[1fr_auto] text-lg font-bold">
        <span>Total Bayar</span>
        <span class="text-green-600">
            Rp {{ number_format($reservasi->total_biaya,0,',','.') }}
        </span>
    </div>

    {{-- FOOTER --}}
    <div class="text-center text-xs text-gray-500 mt-6">
        <p>Terima kasih telah melakukan reservasi</p>
        <p>Harap simpan struk ini sebagai bukti</p>
    </div>

    {{-- BUTTON --}}
    <div class="mt-6 flex gap-2 no-print">
        <a href="{{ route('users.dashboard') }}"
           class="w-full text-center bg-gray-200 hover:bg-gray-300 text-gray-800 py-2 rounded font-semibold">
            Kembali
        </a>

        <button onclick="window.print()"
           class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded font-semibold">
            Cetak
        </button>
    </div>

</div>
@endsection
