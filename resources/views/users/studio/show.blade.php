@extends('layouts.user')

@section('content')
<div class="max-w-5xl mx-auto">

    <div class="bg-slate-950/70 border border-slate-800 rounded-3xl shadow-2xl overflow-hidden">

        @if ($studio->foto)
        <div class="relative bg-black">
            <img src="{{ asset('studio/' . $studio->foto) }}"
                 class="w-full max-h-[420px] object-cover">

            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>

            <div class="absolute bottom-6 left-6 right-6 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-white">
                        {{ $studio->nama_studio }}
                    </h1>
                    <p class="text-sm text-slate-200 mt-1">
                        Kapasitas {{ $studio->kapasitas }} orang
                    </p>
                </div>
                <div class="text-right">
                    <p class="text-xs text-slate-300">Tarif per jam</p>
                    <p class="text-xl font-bold text-emerald-400">
                        Rp {{ number_format($studio->harga_per_jam) }}
                    </p>
                </div>
            </div>
        </div>
        @endif

        <div class="p-6 md:p-8 text-slate-200 space-y-8">

            <div>
                <h2 class="text-sm font-semibold text-slate-300 mb-3">
                    Fasilitas studio
                </h2>

                <div class="flex flex-wrap gap-2">
                    @foreach (explode(',', $studio->fasilitas) as $fasilitas)
                        <span class="px-3 py-1 rounded-full
                                     bg-slate-800/80 border border-slate-700
                                     text-[11px] text-slate-200">
                            {{ trim($fasilitas) }}
                        </span>
                    @endforeach
                </div>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('users.reservasi.create', $studio->id) }}"
                   class="px-6 py-2.5 rounded-xl font-semibold text-sm
                          bg-emerald-500 hover:bg-emerald-400
                          text-slate-950 transition shadow-lg">
                    Pesan Jadwal
                </a>

                <a href="{{ route('users.studio') }}"
                   class="px-6 py-2.5 rounded-xl text-sm
                          border border-slate-600
                          text-slate-100 hover:bg-slate-800
                          transition">
                    Kembali ke daftar
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
