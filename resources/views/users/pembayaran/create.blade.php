@extends('layouts.user')

@section('content')
<div class="max-w-4xl mx-auto mt-4">

    <!-- HEADER RINGKAS -->
    <!-- HEADER --> <div class="mb-4 rounded-2xl p-4 bg-gradient-to-r from-indigo-600/80 to-purple-600/80 shadow-lg border border-white/10 backdrop-blur text-center"> <h1 class="text-xl md:text-2xl font-bold text-white"> Pembayaran Reservasi </h1> <p class="text-xs text-indigo-100 mt-1"> Pastikan nominal transfer sesuai agar reservasi bisa segera diproses. </p> </div>

    <div class="space-y-3">

        <!-- INFO RESERVASI -->
        <div class="rounded-xl p-3
                    bg-white/5 backdrop-blur
                    border border-white/10
                    shadow text-xs text-slate-700">

            <p class="text-sm font-bold text-slate-900 mb-1">
                {{ $reservasi->studio->nama_studio }}
            </p>

            <div class="space-y-0.5">
                <p>
                    <span class="inline-block w-20 font-semibold">Nama</span>:
                    {{ Auth::user()->nama }}
                </p>
                <p>
                    <span class="inline-block w-20 font-semibold">Tanggal</span>:
                    {{ date('d-m-Y', strtotime($reservasi->jadwal->tanggal)) }}
                </p>
                <p>
                    <span class="inline-block w-20 font-semibold">Jam</span>:
                    {{ substr($reservasi->jadwal->jam_dimulai,0,5) }} -
                    {{ substr($reservasi->jadwal->jam_selesai,0,5) }}
                </p>
            </div>

            <div class="mt-2 flex items-center justify-between">
                <span class="text-[11px] text-slate-500">Total</span>
                <span class="text-base font-bold text-emerald-600">
                    Rp {{ number_format($reservasi->total_biaya,0,',','.') }}
                </span>
            </div>
        </div>

        <!-- INSTRUKSI -->
        <div class="rounded-xl p-3
                    bg-white/5 backdrop-blur
                    border border-white/10
                    shadow text-[11px] text-slate-700 space-y-2">

            <p class="font-semibold text-slate-800">
                Transfer ke salah satu rekening:
            </p>

            <div class="grid sm:grid-cols-2 gap-2">

                <div class="rounded-lg p-2 bg-white border">
                    <b>BCA</b><br>
                    1234567890<br>
                    a.n Studio Musik
                </div>

                <div class="rounded-lg p-2 bg-white border">
                    <b>BRI</b><br>
                    9876543210<br>
                    a.n Studio Musik
                </div>

                <div class="rounded-lg p-2 bg-white border">
                    <b>Mandiri</b><br>
                    1122334455<br>
                    a.n Studio Musik
                </div>

                <div class="rounded-lg p-2 bg-white border">
                    <b>BNI</b><br>
                    5566778899<br>
                    a.n Studio Musik
                </div>

            </div>

            <p class="text-amber-600">
                Transfer sesuai total lalu upload bukti.
            </p>
        </div>

        <!-- FORM UPLOAD -->
        <form action="{{ route('users.pembayaran.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="rounded-xl p-3
                     bg-white/5 backdrop-blur
                     border border-white/10
                     shadow space-y-2">
            @csrf
            <input type="hidden" name="reservasi_id" value="{{ $reservasi->id }}">

            <input type="file"
                   name="bukti_transfer"
                   required
                   class="w-full p-2 text-xs rounded border">

            <button type="submit"
                    class="w-full py-2 rounded-lg
                           bg-emerald-400 hover:bg-emerald-300
                           font-semibold text-xs text-slate-900 transition">
                Upload Bukti Pembayaran
            </button>
        </form>

    </div>
</div>
@endsection
