@extends('layouts.admin')

@section('content')
<div class="p-6 bg-white min-h-screen flex justify-center items-start">

    <div class="bg-gray-100 p-6 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edit User</h1>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <input type="text" name="nama"
                       value="{{ $user->nama }}"
                       class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500"
                       required>
            </div>

            <div class="mb-4">
                <input type="email" name="email"
                       value="{{ $user->email }}"
                       class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500"
                       required>
            </div>

            <div class="mb-4">
                <input type="password" name="password"
                       placeholder="Password (kosongkan jika tidak diubah)"
                       class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>

            <div class="mb-4">
                <select name="role"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500"
                        required>
                    <option value="users" {{ $user->role == 'users' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div class="flex justify-between">
                <button type="submit"
                        class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded transition">
                    Update
                </button>

                <a href="{{ route('admin.users.index') }}"
                   class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded transition">
                    Kembali
                </a>
            </div>
        </form>
    </div>

</div>
@endsection
