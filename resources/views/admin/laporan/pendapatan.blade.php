@extends('layouts.admin')

@section('title', 'Laporan Pendapatan')

@section('content')

<!-- HEADER -->
<div class="mb-6 text-center">
    <h1 class="text-2xl font-bold text-gray-800 mb-1">
        Laporan Pendapatan
    </h1>
    <p class="text-sm text-gray-500">
        Filter pendapatan berdasarkan rentang tanggal dan studio.
    </p>
</div>

<!-- FILTER -->
<div class="bg-white p-5 rounded-xl mb-6 border border-gray-200 shadow-sm">
    <form method="GET" action="{{ route('admin.laporan.pendapatan') }}"
          class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">

        <div>
            <label class="block text-xs text-gray-600 mb-1">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" value="{{ $tanggalMulai }}"
                   class="w-full p-2 rounded border border-gray-300 text-sm focus:ring focus:ring-indigo-200">
        </div>

        <div>
            <label class="block text-xs text-gray-600 mb-1">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" value="{{ $tanggalSelesai }}"
                   class="w-full p-2 rounded border border-gray-300 text-sm focus:ring focus:ring-indigo-200">
        </div>

        <div>
            <label class="block text-xs text-gray-600 mb-1">Studio</label>
            <select name="studio_id"
                    class="w-full p-2 rounded border border-gray-300 text-sm focus:ring focus:ring-indigo-200">
                <option value="">Semua Studio</option>
                @foreach($studioList as $studio)
                    <option value="{{ $studio->id }}"
                        {{ $studioId == $studio->id ? 'selected' : '' }}>
                        {{ $studio->nama_studio }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700
                       text-white font-semibold py-2 rounded transition">
                Tampilkan
            </button>
        </div>
    </form>
</div>

<!-- STATISTIK + CETAK -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

    <!-- Total Pendapatan -->
    <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">
        <p class="text-sm text-gray-500 mb-1">💰 Total Pendapatan</p>
        <p class="text-2xl font-bold text-green-600">
            Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
        </p>
    </div>

    <!-- Jumlah Transaksi -->
    <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">
        <p class="text-sm text-gray-500 mb-1">📦 Jumlah Transaksi</p>
        <p class="text-2xl font-bold text-gray-800">
            {{ $reservasi->count() }}
        </p>
    </div>

    <!-- Tombol Cetak -->
    <form action="{{ route('admin.laporan.pendapatan.cetak') }}"
          method="GET"
          target="_blank"
          class="flex items-center justify-center">

        <input type="hidden" name="tanggal_mulai" value="{{ request('tanggal_mulai') }}">
        <input type="hidden" name="tanggal_selesai" value="{{ request('tanggal_selesai') }}">
        <input type="hidden" name="studio_id" value="{{ request('studio_id') }}">

        <button type="submit"
           class="bg-green-600 hover:bg-green-700
       text-white text-sm font-semibold
       px-4 py-2 rounded-lg shadow
       flex items-center gap-2
       transition">
            🖨 Cetak Laporan
        </button>
    </form>


</div>



<!-- DETAIL TRANSAKSI -->
<div class="bg-white p-5 rounded-xl mb-6 border border-gray-200 shadow-sm overflow-x-auto">
    <h2 class="text-lg font-semibold mb-4 text-gray-800">
        Detail Transaksi
    </h2>

    <table class="w-full text-sm text-gray-700">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="p-3 text-left">Tanggal</th>
                <th class="p-3 text-left">Studio</th>
                <th class="p-3 text-left">Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservasi as $item)
                <tr class="border-t hover:bg-gray-50 transition">
                    <td class="p-3">
                        {{ $item->created_at->format('d-m-Y') }}
                    </td>
                    <td class="p-3">
                        {{ $item->studio->nama_studio ?? '-' }}
                    </td>
                    <td class="p-3 text-green-600 font-medium">
                        Rp {{ number_format($item->total_biaya, 0, ',', '.') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="p-4 text-center text-gray-500">
                        Tidak ada data transaksi.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- PENDAPATAN PER STUDIO -->
<div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm overflow-x-auto">
    <h2 class="text-lg font-semibold mb-4 text-gray-800">
        Pendapatan Per Studio
    </h2>

    <table class="w-full text-sm text-gray-700">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="p-3 text-left">Studio</th>
                <th class="p-3 text-left">Total Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pendapatanPerStudio as $row)
                <tr class="border-t hover:bg-gray-50 transition">
                    <td class="p-3">
                        {{ $row['studio']->nama_studio ?? '-' }}
                    </td>
                    <td class="p-3 text-green-600 font-medium">
                        Rp {{ number_format($row['total'], 0, ',', '.') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="p-4 text-center text-gray-500">
                        Tidak ada data pendapatan per studio.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
