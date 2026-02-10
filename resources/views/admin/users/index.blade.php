@extends('layouts.admin')

@section('content')
<div class="p-6 bg-white min-h-screen rounded-lg shadow">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Data Pelanggan</h1>
        <a href="{{ route('admin.users.create') }}"
           class="bg-blue-600 px-4 py-2 rounded text-white hover:bg-blue-700 transition">
            + Tambah Pelanggan
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-700 border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border-b">No</th>
                    <th class="p-2 border-b">Nama</th>
                    <th class="p-2 border-b">Email</th>
                    <th class="p-2 border-b">No. HP</th>
                    <th class="p-2 border-b text-center">Total Pesanan</th>
                    <th class="p-2 border-b text-center">Diskon Aktif</th>
                    <th class="p-2 border-b">Role</th>
                    <th class="p-2 border-b text-center">Aksi</th>

                </tr>
            </thead>
            <tbody>
                @foreach($users as $no => $user)
                @php
                    $diskon = '-';
                    $badgeClass = 'bg-gray-100 text-gray-500';

                    if ($user->total_pesanan >= 20) {
                        $diskon = '25%';
                        $badgeClass = 'bg-green-100 text-green-700 border border-green-200 font-bold';
                    } elseif ($user->total_pesanan >= 10) {
                        $diskon = '10%';
                        $badgeClass = 'bg-blue-100 text-blue-700 border border-blue-200 font-bold';
                    } elseif ($user->total_pesanan >= 5) {
                        $diskon = '5%';
                        $badgeClass = 'bg-yellow-100 text-yellow-700 border border-yellow-200 font-bold';
                    }
                @endphp
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-2 text-center">{{ $no + 1 }}</td>
                    <td class="p-2">{{ $user->nama }}</td>
                    <td class="p-2">{{ $user->email }}</td>
                    <td class="p-2">{{ $user->no_hp ?? '-' }}</td>
                    <td class="p-2 text-center font-semibold">{{ $user->total_pesanan }}</td>
                    <td class="p-2 text-center">
                        <span class="px-2 py-1 rounded text-xs {{ $badgeClass }}">
                            {{ $diskon }}
                        </span>
                    </td>
                    <td class="p-2 capitalize">{{ $user->role }}</td>
                    <td class="p-2 space-x-2 text-center">
                        <a href="{{ route('admin.users.edit', $user->id) }}"
                           class="bg-yellow-500 px-3 py-1 rounded text-white hover:bg-yellow-600 transition">
                           Edit
                        </a>

                        <form action="{{ route('admin.users.destroy', $user->id) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus user?')"
                                    class="bg-red-600 px-3 py-1 rounded text-white hover:bg-red-700 transition">
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
