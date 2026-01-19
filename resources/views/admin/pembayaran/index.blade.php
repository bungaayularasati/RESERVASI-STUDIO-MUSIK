@extends('layouts.admin')

@section('content')
<div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200">

    <!-- JUDUL -->
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold text-gray-800 mb-1">
        Validasi Pembayaran
    </h1>
    <p class="text-sm text-gray-500">
        Daftar pembayaran yang perlu diverifikasi admin
    </p>
    </div>

    <!-- TABLE -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-gray-700 border border-gray-200 rounded-xl overflow-hidden">

            <!-- HEAD -->
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="p-4 text-center min-w-[40px]">No</th>
                    <th class="p-4 text-center min-w-[150px]">User</th>
                    <th class="p-4 text-center min-w-[150px]">Studio</th>
                    <th class="p-4 text-center min-w-[120px]">Tanggal</th>
                    <th class="p-4 text-center min-w-[120px]">Total</th>
                    <th class="p-4 text-center min-w-[100px]">Status</th>
                    <th class="p-4 text-center min-w-[180px]">Aksi</th>
                </tr>
            </thead>

            <!-- BODY -->
            <tbody>
            @forelse ($pembayaran as $item)
                <tr class="border-t hover:bg-gray-50 transition">

                    <td class="p-4 text-center font-semibold whitespace-nowrap">{{ $loop->iteration }}</td>
                    <td class="p-4 text-center whitespace-nowrap">{{ $item->reservasi->user->nama }}</td>
                    <td class="p-4 text-center font-medium whitespace-nowrap">{{ $item->reservasi->studio->nama_studio }}</td>
                    <td class="p-4 text-center whitespace-nowrap">{{ $item->reservasi->jadwal->tanggal }}</td>
                    <td class="p-4 text-center font-semibold text-gray-800 whitespace-nowrap">
                        Rp {{ number_format($item->reservasi->total_biaya,0,',','.') }}
                    </td>

                    <!-- STATUS -->
                    <td class="p-4 text-center whitespace-nowrap">
                        <span class="px-3 py-1 rounded-full text-xs font-bold text-white
                            @if($item->status=='menunggu') bg-yellow-500
                            @elseif($item->status=='valid') bg-green-600
                            @else bg-red-600 @endif">
                            {{ strtoupper($item->status) }}
                        </span>
                    </td>

                    <!-- AKSI -->
                    <td class="p-4 text-center whitespace-nowrap">
                        @if($item->status == 'menunggu')
                            <div class="flex justify-center gap-2">

                                <form method="POST" action="{{ route('admin.pembayaran.valid', $item->id) }}">
                                    @csrf
                                    <button class="px-3 py-1 rounded-lg bg-green-600 hover:bg-green-700
                                                   text-white text-xs font-semibold transition">
                                        ✔ Valid
                                    </button>
                                </form>

                                @if($item->metode != 'tunai')
                                    <form method="POST" action="{{ route('admin.pembayaran.invalid', $item->id) }}">
                                        @csrf
                                        <button class="px-3 py-1 rounded-lg bg-red-600 hover:bg-red-700
                                                       text-white text-xs font-semibold transition">
                                            ✖ Tolak
                                        </button>
                                    </form>

                                    <a href="{{ route('admin.pembayaran.bukti', $item->id) }}"
                                       target="_blank"
                                       class="px-3 py-1 rounded-lg bg-blue-600 hover:bg-blue-700
                                              text-white text-xs font-semibold transition">
                                        📄 Bukti
                                    </a>
                                @endif
                            </div>
                        @else
                            <span class="text-green-600 font-semibold text-xs">
                                ✔ Selesai
                            </span>
                        @endif
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="7" class="p-8 text-center text-gray-500 italic">
                        Data pembayaran belum tersedia
                    </td>
                </tr>
            @endforelse
            </tbody>

        </table>
    </div>
</div>
@endsection
