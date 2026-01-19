@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="space-y-10">

    <!-- HEADER -->
    <div class="rounded-2xl bg-gradient-to-r from-indigo-600 to-indigo-500 p-6 text-white shadow">
        <h1 class="text-3xl font-extrabold">
            Dashboard Admin
        </h1>
        <p class="text-indigo-100 mt-1 text-sm">
            Ringkasan data dan kontrol sistem reservasi studio musik
        </p>
    </div>

    <!-- STATISTIC CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="bg-white rounded-2xl p-5 shadow-sm hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Studio</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">
                        {{ $totalStudio }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-xl flex items-center justify-center text-xl">
                    🎶
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Jadwal</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">
                        {{ $totalJadwal }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center text-xl">
                    📅
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Reservasi Pending</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">
                        {{ $reservasiPending }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center text-xl">
                    ⏳
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Menunggu Validasi</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">
                        {{ $validasiPembayaran }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center text-xl">
                    💳
                </div>
            </div>
        </div>

    </div>

    
    <!-- QUICK ACTION -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">
            Akses Cepat
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

            <a href="{{ route('admin.studio.index') }}"
               class="group bg-white border border-gray-200 rounded-xl p-5 shadow-sm hover:shadow-md transition">
                <p class="font-semibold text-gray-800 group-hover:text-indigo-600 transition">
                    Kelola Studio
                </p>
                <p class="mt-1 text-sm text-gray-600">
                    Tambah, ubah, dan hapus data studio.
                </p>
            </a>

            <a href="{{ route('admin.reservasi.index') }}"
               class="group bg-white border border-gray-200 rounded-xl p-5 shadow-sm hover:shadow-md transition">
                <p class="font-semibold text-gray-800 group-hover:text-indigo-600 transition">
                    Pantau Reservasi
                </p>
                <p class="mt-1 text-sm text-gray-600">
                    Cek status reservasi & pembayaran user.
                </p>
            </a>

            <a href="{{ route('admin.laporan.pendapatan') }}"
               class="group bg-white border border-gray-200 rounded-xl p-5 shadow-sm hover:shadow-md transition">
                <p class="font-semibold text-gray-800 group-hover:text-indigo-600 transition">
                    Laporan Pendapatan
                </p>
                <p class="mt-1 text-sm text-gray-600">
                    Lihat performa pendapatan studio.
                </p>
            </a>

        </div>
    </div>

</div>

@endsection
