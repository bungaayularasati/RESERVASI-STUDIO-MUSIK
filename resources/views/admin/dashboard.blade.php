@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="space-y-8">

    <!-- HEADER -->
    <div class="rounded-xl bg-gradient-to-r from-indigo-600 to-sky-500 p-6 text-white shadow-md">
        <h1 class="text-2xl font-bold tracking-tight">
            Dashboard Admin
        </h1>
        <p class="text-indigo-100 mt-1 text-sm">
            Monitoring dan kontrol sistem reservasi studio musik
        </p>
    </div>

    <!-- STATISTIC SECTION -->
<div class="bg-white rounded-2xl border border-gray-200 p-6 shadow-sm">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-semibold text-gray-800">
            Ringkasan Data
        </h2>
        <span class="text-sm text-gray-500">
            Overview
        </span>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Total Studio -->
        <div
            class="group rounded-2xl border border-gray-200 p-6
                   hover:shadow-lg transition-all duration-300 bg-gradient-to-br from-yellow-50 to-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs uppercase tracking-wider text-gray-500">
                        Total Studio
                    </p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">
                        {{ $totalStudio }}
                    </p>
                </div>

                <div
                    class="w-12 h-12 rounded-xl bg-yellow-100 text-yellow-600
                           flex items-center justify-center
                           group-hover:scale-110 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 19V6l12-2v13" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Reservasi Pending -->
        <div
            class="group rounded-2xl border border-gray-200 p-6
                   hover:shadow-lg transition-all duration-300 bg-gradient-to-br from-orange-50 to-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs uppercase tracking-wider text-gray-500">
                        Reservasi Pending
                    </p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">
                        {{ $reservasiPending }}
                    </p>
                </div>

                <div
                    class="w-12 h-12 rounded-xl bg-orange-100 text-orange-600
                           flex items-center justify-center
                           group-hover:scale-110 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Menunggu Validasi -->
        <div
            class="group rounded-2xl border border-gray-200 p-6
                   hover:shadow-lg transition-all duration-300 bg-gradient-to-br from-emerald-50 to-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs uppercase tracking-wider text-gray-500">
                        Menunggu Validasi
                    </p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">
                        {{ $validasiPembayaran }}
                    </p>
                </div>

                <div
                    class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600
                           flex items-center justify-center
                           group-hover:scale-110 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 9V7a5 5 0 00-10 0v2
                                 M5 9h14l-1 11H6L5 9z" />
                    </svg>
                </div>
            </div>
        </div>

    </div>
</div>

    <!-- QUICK ACCESS -->
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <h2 class="text-base font-semibold text-gray-800 mb-4">
            Akses Cepat
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

            <!-- Kelola Studio -->
            <a href="{{ route('admin.studio.index') }}"
               class="rounded-xl border border-gray-200 p-5 hover:border-indigo-400 hover:shadow-md transition group">

                <p class="font-semibold text-gray-800 group-hover:text-indigo-600">
                    Kelola Studio
                </p>
                <p class="mt-2 text-sm text-gray-500">
                    Tambah, ubah, dan hapus data studio.
                </p>

                <span class="mt-4 inline-block text-xs font-medium text-indigo-500">
                    Buka menu →
                </span>
            </a>

            <!-- Pantau Reservasi -->
            <a href="{{ route('admin.reservasi.index') }}"
               class="rounded-xl border border-gray-200 p-5 hover:border-indigo-400 hover:shadow-md transition group">

                <p class="font-semibold text-gray-800 group-hover:text-indigo-600">
                    Pantau Reservasi
                </p>
                <p class="mt-2 text-sm text-gray-500">
                    Cek status reservasi dan pembayaran user.
                </p>

                <span class="mt-4 inline-block text-xs font-medium text-indigo-500">
                    Buka menu →
                </span>
            </a>

            <!-- Laporan Pendapatan -->
            <a href="{{ route('admin.laporan.pendapatan') }}"
               class="rounded-xl border border-gray-200 p-5 hover:border-indigo-400 hover:shadow-md transition group">

                <p class="font-semibold text-gray-800 group-hover:text-indigo-600">
                    Laporan Pendapatan
                </p>
                <p class="mt-2 text-sm text-gray-500">
                    Lihat ringkasan dan performa pendapatan studio.
                </p>

                <span class="mt-4 inline-block text-xs font-medium text-indigo-500">
                    Buka menu →
                </span>
            </a>

        </div>
    </div>

</div>

@endsection
