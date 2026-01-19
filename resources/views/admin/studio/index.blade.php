@extends('layouts.admin')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Data Studio</h1>

        <a href="{{ route('admin.studio.create') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm transition">
            + Tambah
        </a>
    </div>

    <div class="bg-white p-4 rounded-lg shadow max-w-5xl mx-auto">

        <table class="w-full text-gray-700 text-sm border-collapse">
            <thead class="bg-gray-100 text-gray-600 text-xs uppercase">
                <tr>
                    <th class="p-2 text-center min-w-[50px]">No</th>
                    <th class="p-2 text-center min-w-[150px]">Nama</th>
                    <th class="p-2 w-28 text-center">Harga</th>
                    <th class="p-2 w-28 text-center">Kapasitas</th>
                    <th class="p-2">Fasilitas</th>
                    <th class="p-2 w-24 text-center">Foto</th>
                    <th class="p-2 w-28 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @foreach ($studio as $i => $item)
                <tr class="hover:bg-gray-50 transition">

                    <td class="p-2 text-center">{{ $i + 1 }}</td>

                    <td class="p-2 text-center font-medium">
                        {{ $item->nama_studio }}
                    </td>

                    <td class="p-2 text-center">
                        Rp {{ number_format($item->harga_per_jam, 0, ',', '.') }}
                    </td>

                    <td class="p-2 text-center">
                        {{ $item->kapasitas }}
                    </td>

                    <td class="p-2 text-gray-600">
                        <div class="line-clamp-2 max-w-xs">
                            {{ $item->fasilitas }}
                        </div>
                    </td>

                    <td class="p-2 text-center">
                        @if ($item->foto)
                            <img src="{{ asset('studio/'.$item->foto) }}"
                                 class="w-10 h-10 rounded object-cover mx-auto border">
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>

                    <td class="p-2 text-center space-x-2">
                        <a href="{{ route('admin.studio.edit', $item->id) }}"
                           class="text-indigo-600 hover:underline text-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.studio.destroy', $item->id) }}"
                              method="POST"
                              class="inline-block"
                              onsubmit="return confirm('Hapus studio ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 hover:underline text-sm">
                                Hapus
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>
@endsection
