@extends('layouts.admin')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">

    <h1 class="text-2xl font-semibold text-gray-800 mb-6">
        Edit Data Studio
    </h1>

    <div class="bg-white p-6 rounded-lg shadow max-w-4xl">

        <form action="{{ route('admin.studio.update', $studio->id) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-6 mb-4">
                <div>
                    <label class="block text-gray-700 mb-1">Nama Studio</label>
                    <input type="text"
                           name="nama_studio"
                           value="{{ $studio->nama_studio }}"
                           class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-400"
                           required>
                </div>

                <div>
                    <label class="block text-gray-700 mb-1">Harga per Jam</label>
                    <input type="number"
                           name="harga_per_jam"
                           value="{{ $studio->harga_per_jam }}"
                           class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-400"
                           required>
                </div>

                <div>
                    <label class="block text-gray-700 mb-1">Kapasitas (orang)</label>
                    <input type="number"
                           name="kapasitas"
                           value="{{ $studio->kapasitas }}"
                           min="1"
                           class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-400"
                           required>
                </div>

                <div>
                    <label class="block text-gray-700 mb-1">Fasilitas</label>
                    <textarea name="fasilitas"
                              class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-400"
                              required>{{ $studio->fasilitas }}</textarea>
                </div>

                <div class="col-span-2">
                    <label class="block text-gray-700 mb-1">Foto Studio</label>

                    @if ($studio->foto)
                        <img src="{{ asset('studio/'.$studio->foto) }}"
                             class="w-32 h-32 object-cover rounded mb-3 border">
                    @endif

                    <input type="file"
                           name="foto"
                           class="w-full p-2 border rounded bg-white">
                </div>
            </div>

            <div class="flex gap-2">
                <button
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded transition">
                    Update
                </button>

                <a href="{{ route('admin.studio.index') }}"
                   class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">
                    Kembali
                </a>
            </div>

        </form>

    </div>
</div>

@endsection
