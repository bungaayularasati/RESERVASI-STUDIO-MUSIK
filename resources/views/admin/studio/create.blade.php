@extends('layouts.admin')

@section('content')

<div class="p-8 bg-white min-h-screen">

    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Tambah Data Studio</h1>

    <div class="bg-gray-100 p-6 rounded-lg shadow-md">

        <form action="{{ route('admin.studio.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-2 gap-6 mb-4">
                <div>
                    <label class="text-gray-700 font-medium">Nama Studio</label>
                    <input type="text" name="nama_studio" class="w-full p-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                </div>

                <div>
                    <label class="text-gray-700 font-medium">Harga per Jam</label>
                    <input type="number" name="harga_per_jam" class="w-full p-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                </div>

                <div>
                    <label class="text-gray-700 font-medium">Kapasitas (orang)</label>
                    <input type="number" name="kapasitas" min="1" class="w-full p-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                </div>

                <div>
                    <label class="text-gray-700 font-medium">Fasilitas</label>
                    <textarea name="fasilitas" class="w-full p-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500" required></textarea>
                </div>

                <div class="col-span-2">
                    <label class="text-gray-700 font-medium">Foto Studio</label>
                    <input type="file" name="foto" class="w-full p-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-green-500 px-4 py-2 rounded text-white hover:bg-green-600 transition duration-200">Simpan</button>
                <a href="{{ route('admin.studio.index') }}" class="px-4 py-2 bg-gray-400 rounded hover:bg-gray-500 text-white transition duration-200">Kembali</a>
            </div>

        </form>

    </div>
</div>

@endsection
