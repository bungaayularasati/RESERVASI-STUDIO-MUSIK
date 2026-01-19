@extends('layouts.user')

@section('content')
<div class="max-w-4xl mx-auto">

    <!-- HEADER -->
    <div class="mb-6 rounded-2xl p-6
                bg-gradient-to-r from-indigo-600/80 to-purple-600/80
                shadow-xl border border-white/10 backdrop-blur">
        <h1 class="text-xl md:text-2xl font-bold text-white">
            Detail Reservasi
        </h1>
        <p class="text-xs text-indigo-100 mt-1">
            Ringkasan pemesanan studio dan status pembayaranmu.
        </p>
    </div>

    <div class="space-y-5">

        <!-- INFO RESERVASI -->
        <div class="rounded-2xl p-5
                    bg-white/5 backdrop-blur-md
                    border border-white/10
                    shadow text-xs text-slate-600">

            <p class="text-base font-bold text-slate-800 mb-3">
                {{ $reservasi->studio->nama_studio }}
            </p>

            <div class="space-y-1">
                <p>
                    <span class="inline-block w-24 font-semibold text-slate-700">Nama</span>
                    <span class="font-medium">: {{ Auth::user()->nama ?? Auth::user()->name }}</span>
                </p>
                <p>
                    <span class="inline-block w-24 font-semibold text-slate-700">Tanggal</span>
                    <span class="font-medium">
                        : {{ date('d-m-Y', strtotime($reservasi->jadwal->tanggal)) }}
                    </span>
                </p>
                <p>
                    <span class="inline-block w-24 font-semibold text-slate-700">Jam</span>
                    <span class="font-medium">
                        :
                        {{ substr($reservasi->jadwal->jam_dimulai, 0, 5) }}
                        -
                        {{ substr($reservasi->jadwal->jam_selesai, 0, 5) }}
                    </span>
                </p>
            </div>
        </div>

        <!-- TOTAL & STATUS -->
        <div class="grid md:grid-cols-2 gap-4">

            <!-- TOTAL -->
            <div class="rounded-2xl p-4
                        bg-white/5 backdrop-blur-md
                        border border-white/10
                        shadow text-xs text-slate-600">

                <p class="text-[11px] uppercase tracking-wide text-slate-500 mb-1">
                    Total biaya
                </p>
                <p class="text-lg font-bold text-emerald-600">
                    Rp {{ number_format($reservasi->total_biaya, 0, ',', '.') }}
                </p>
            </div>

            <!-- STATUS -->
            <div class="bg-white rounded-2xl p-6 shadow">
                <p class="text-xs uppercase tracking-wide text-gray-500 mb-3">
                    Status Reservasi
                </p>

                <div class="flex items-center justify-between mb-3">
                    <span class="text-sm font-semibold text-gray-700">Reservasi</span>

                    @if($reservasi->pembayaran && $reservasi->pembayaran->status === 'invalid')
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                            Pembayaran Ditolak
                        </span>
                    @elseif($reservasi->status === 'pending')
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-700">
                            Menunggu Pembayaran
                        </span>
                    @elseif($reservasi->status === 'dibayar')
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">
                            Pembayaran Lunas
                        </span>
                    @elseif($reservasi->status === 'selesai')
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">
                            Reservasi Selesai
                        </span>
                    @endif
                </div>

                <hr class="my-3">

                <div class="flex items-center justify-between">
                    <span class="text-sm font-semibold text-gray-700">Pembayaran</span>

                    @if($reservasi->pembayaran)
                        @if($reservasi->pembayaran->status === 'menunggu')
                            <span class="text-xs font-semibold text-amber-600">Menunggu Validasi</span>
                        @elseif($reservasi->pembayaran->status === 'valid')
                            <span class="text-xs font-semibold text-emerald-600">Diterima</span>
                        @elseif($reservasi->pembayaran->status === 'invalid')
                            <span class="text-xs font-semibold text-red-600">Ditolak</span>
                        @endif
                    @else
                        <span class="text-xs text-gray-400">Belum ada pembayaran</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- ACTION BUTTON -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-3">

    {{-- LIHAT STRUK (HANYA JIKA LUNAS & VALID) --}}
    @if(
        in_array($reservasi->status, ['dibayar', 'selesai']) &&
        $reservasi->pembayaran &&
        $reservasi->pembayaran->status === 'valid'
    )
        <a href="{{ route('users.reservasi.struk', $reservasi->id) }}"
           class="flex items-center justify-center
                  bg-gradient-to-r from-sky-400 to-indigo-500
                  hover:from-sky-300 hover:to-indigo-400
                  py-3 rounded-xl text-sm font-semibold text-slate-900
                  transition shadow">
            Lihat Struk
        </a>
    @endif

    {{-- KEMBALI (SELALU ADA) --}}
    <a href="{{ route('users.reservasi.index') }}"
       class="flex items-center justify-center
                  bg-gradient-to-r from-sky-400 to-indigo-500
                  hover:from-sky-300 hover:to-indigo-400
                  py-3 rounded-xl text-sm font-semibold text-slate-900
                  transition shadow">
        Kembali
    </a>

</div>
    </div>
</div>

{{-- SWEETALERT --}}
@if(session('success'))
<script>
Swal.fire({
    title: 'Berhasil',
    html: "{{ session('success') }}",
    icon: 'success',
    confirmButtonText: 'OK',
    backdrop: true
});
</script>
@endif

@endsection
