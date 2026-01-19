@extends('layouts.user')

@section('content')
<div class="space-y-10">

    <!-- HERO / WELCOME -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-indigo-600 via-purple-600 to-fuchsia-600 p-8 text-white shadow-xl">
        <div class="relative z-10">
            <h1 class="text-3xl font-bold tracking-tight">
                Selamat Datang 🎶
            </h1>
            <p class="mt-2 max-w-xl text-sm text-indigo-100">
                Reservasi studio musik kini lebih cepat, rapi, dan terjadwal sesuai kebutuhan latihanmu.
            </p>

            <div class="mt-6 flex flex-wrap gap-3">
                <a href="{{ route('users.studio') }}"
                   class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-2.5 text-sm font-semibold text-indigo-600 shadow hover:bg-indigo-50 transition">
                    🎧 Lihat Studio
                </a>
            </div>
        </div>

        <!-- Decorative Blur -->
        <div class="absolute -top-20 -right-20 h-60 w-60 rounded-full bg-white/20 blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 h-60 w-60 rounded-full bg-black/20 blur-3xl"></div>
    </div>



    <!-- FITUR UTAMA -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="group rounded-2xl bg-white p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">
            <div class="mb-3 text-3xl">🗓️</div>
            <h2 class="text-base font-semibold text-gray-800 group-hover:text-indigo-600 transition">
                Buat Reservasi
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Pilih studio, tanggal, dan jam latihan sesuai keinginan.
            </p>
        </div>

        <div class="group rounded-2xl bg-white p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">
            <div class="mb-3 text-3xl">📋</div>
            <h2 class="text-base font-semibold text-gray-800 group-hover:text-indigo-600 transition">
                Kelola Jadwal
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Pantau status dan riwayat reservasi kamu dengan mudah.
            </p>
        </div>

        <div class="group rounded-2xl bg-white p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">
            <div class="mb-3 text-3xl">🎸</div>
            <h2 class="text-base font-semibold text-gray-800 group-hover:text-indigo-600 transition">
                Informasi Studio
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Lihat fasilitas, kapasitas, dan jam operasional studio.
            </p>
        </div>

    </div>

</div>
@endsection
