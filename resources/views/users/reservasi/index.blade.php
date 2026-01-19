@extends('layouts.user')

@section('content')
<div class="max-w-5xl mx-auto">

    <!-- HEADER -->
    <div class="mb-6 rounded-2xl p-6
                bg-gradient-to-r from-indigo-600/80 to-purple-600/80
                shadow-xl border border-white/10 backdrop-blur">
        <h1 class="text-xl md:text-2xl font-bold text-white">
            Reservasi Saya
        </h1>
        <p class="text-xs text-indigo-100 mt-1">
            Lihat semua jadwal studio yang sudah kamu pesan.
        </p>
    </div>

    @forelse($reservasi as $item)
        <div class="mb-4 rounded-2xl p-4 md:p-5
                    bg-white/5 backdrop-blur-md
                    border border-white/10
                    shadow-lg">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

               <!-- INFO -->
<div class="space-y-1 text-xs text-slate-600">

    <p class="text-sm font-bold text-slate-800">
        {{ $item->studio->nama_studio }}
    </p>

    <p>
        <span class="font-semibold text-slate-700">Tanggal</span>
        <span class="ml-2 font-medium text-slate-600">
            {{ date('d-m-Y', strtotime($item->jadwal->tanggal)) }}
        </span>
    </p>

    <p>
        <span class="font-semibold text-slate-700">Jam</span>
        <span class="ml-2 font-medium text-slate-600">
            {{ substr($item->jadwal->jam_dimulai,0,5) }} -
            {{ substr($item->jadwal->jam_selesai,0,5) }}
        </span>
    </p>

    <p>
        <span class="font-semibold text-slate-700">Status</span>
        <span class="ml-2">
            @if($item->pembayaran && $item->pembayaran->status === 'menunggu')
                <span class="px-2 py-0.5 rounded-full text-[11px]
                             font-semibold
                             bg-amber-500/20 text-amber-700 border border-amber-400/40">
                    Menunggu verifikasi
                </span>
            @elseif($item->pembayaran && $item->pembayaran->status === 'valid')
                <span class="px-2 py-0.5 rounded-full text-[11px]
                             font-semibold
                             bg-emerald-500/20 text-emerald-700 border border-emerald-400/40">
                    Lunas
                </span>
            @elseif($item->pembayaran && $item->pembayaran->status === 'invalid')
                <span class="px-2 py-0.5 rounded-full text-[11px]
                             font-semibold
                             bg-red-500/20 text-red-700 border border-red-400/40">
                    Pembayaran ditolak
                </span>
            @else
                <span class="px-2 py-0.5 rounded-full text-[11px]
                             font-semibold
                             bg-slate-500/20 text-slate-700 border border-slate-400/40">
                    Belum dibayar
                </span>
            @endif
        </span>
    </p>

</div>
                      <!-- ACTION -->
                <div class="flex flex-row md:flex-col md:items-end justify-between md:justify-center gap-3">

                    <div class="text-right">
                        <p class="text-[11px] uppercase tracking-wide text-slate-500">
                            Total
                        </p>
                        <p class="text-sm font-bold text-slate-800">
                            Rp {{ number_format($item->total_biaya, 0, ',', '.') }}
                        </p>
                    </div>
                    <a href="{{ route('users.reservasi.show', $item->id) }}"
                       class="px-4 py-1.5 rounded-xl
                              bg-gradient-to-r from-sky-400 to-indigo-500
                              text-slate-900 font-semibold
                              hover:from-sky-300 hover:to-indigo-400 transition">
                        Detail
                    </a>
                </div>

            </div>
        </div>
    @empty
        <div class="rounded-2xl py-12 text-center
                    bg-white/5 backdrop-blur
                    border border-white/10
                    text-sm text-slate-300">
            Belum ada reservasi.
            Mulai dengan memilih studio terlebih dahulu.
        </div>
    @endforelse

</div>
@endsection
