@extends('layouts.user')

@section('content')

<div class="mb-10 text-center">
    <h1 class="text-2xl md:text-3xl font-bold text-slate-900">
        Pilih studio yang sesuai dengan kebutuhanmu
    </h1>
    <p class="text-slate-600 mt-2 max-w-xl mx-auto text-sm">
        Dari latihan santai sampai rekaman serius, pilih studio dengan fasilitas terbaik.
    </p>
    <div class="w-16 h-1 bg-emerald-500 mx-auto mt-4 rounded-full"></div>
</div>


<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

@foreach ($studio as $item)
<div class="bg-slate-950/70 border border-slate-800 rounded-2xl overflow-hidden shadow-lg flex flex-col">
    <img
        src="{{ asset('studio/'.$item->foto) }}"
        class="w-full h-44 object-cover"
        alt="{{ $item->nama_studio }}"
    >

    <div class="p-4 flex-1 flex flex-col">

        <h2 class="text-base font-semibold mb-1 text-slate-50">
            {{ $item->nama_studio }}
        </h2>

        <p class="text-xs text-slate-400 mb-2">
            Kapasitas: {{ $item->kapasitas }} orang
        </p>

        <p class="text-emerald-400 font-semibold mb-3 text-sm">
            Rp {{ number_format($item->harga_per_jam) }}
            <span class="text-slate-400 text-xs font-normal">
                / jam
            </span>
        </p>

        <div class="flex flex-wrap gap-2 mb-4">
            @foreach (explode(',', $item->fasilitas) as $fasilitas)
                <span class="text-[11px] text-slate-300 border border-slate-700 px-2 py-1 rounded-full">
                    {{ trim($fasilitas) }}
                </span>
            @endforeach
        </div>

        <a href="{{ route('users.reservasi.create', $item->id) }}"
           class="mt-auto block w-full text-center
                  border border-emerald-500/60 text-emerald-300
                  py-2 rounded-lg text-xs font-semibold tracking-wide
                  hover:bg-emerald-500 hover:text-slate-950
                  transition">
            Pesan Sekarang
        </a>
    </div>
</div>
@endforeach

</div>

@endsection
