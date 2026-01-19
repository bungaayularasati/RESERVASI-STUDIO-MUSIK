<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
<aside class="w-64 bg-gray-100 h-screen fixed">

    <div class="h-16 flex items-center justify-center bg-white shadow">
        <img src="{{ asset('images/studio_a.jpg') }}" class="w-8 h-8 mr-2">
        <span class="font-bold text-lg text-gray-800">Studio Musik</span>
    </div>

   <nav class="mt-6">
    <ul class="text-gray-700">

        <li>
            <a href="{{ route('admin.dashboard') }}"
               class="block px-4 py-3 rounded hover:bg-indigo-100 transition duration-200 text-base font-semibold
               {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-100' : '' }}">
                Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('admin.studio.index') }}"
               class="block px-4 py-3 rounded hover:bg-indigo-100 transition duration-200 text-base font-semibold
               {{ request()->routeIs('admin.studio.*') ? 'bg-indigo-100' : '' }}">
                Data Studio
            </a>
        </li>

        <li>
            <a href="{{ route('admin.jadwal.index') }}"
               class="block px-4 py-3 rounded hover:bg-indigo-100 transition duration-200 text-base font-semibold
               {{ request()->routeIs('admin.jadwal.*') ? 'bg-indigo-100' : '' }}">
                Jadwal
            </a>
        </li>

        <li>
            <a href="{{ route('admin.users.index') }}"
               class="block px-4 py-3 rounded hover:bg-indigo-100 transition duration-200 text-base font-semibold
               {{ request()->routeIs('admin.users.*') ? 'bg-indigo-100' : '' }}">
                Data User
            </a>
        </li>

        <li>
            <a href="{{ route('admin.reservasi.index') }}"
               class="block px-4 py-3 rounded hover:bg-indigo-100 transition duration-200 text-base font-semibold
               {{ request()->routeIs('admin.reservasi.*') ? 'bg-indigo-100' : '' }}">
                Data Reservasi
            </a>
        </li>

        <li>
            <a href="{{ route('admin.pembayaran.index') }}"
               class="block px-4 py-3 rounded hover:bg-indigo-100 transition duration-200 text-base font-semibold
               {{ request()->routeIs('admin.pembayaran.*') ? 'bg-indigo-100' : '' }}">
                Pembayaran
            </a>
        </li>

        <li>
            <a href="{{ route('admin.laporan.pendapatan') }}"
               class="block px-4 py-3 rounded hover:bg-indigo-100 transition duration-200 text-base font-semibold
               {{ request()->routeIs('admin.laporan.*') ? 'bg-indigo-100' : '' }}">
                Laporan
            </a>
        </li>


        </ul>
    </nav>
</aside>

    <!-- MAIN -->
    <div class="flex-1 ml-64 flex flex-col">

        <!-- NAVBAR -->
<header class="h-16 bg-white border-b border-gray-200 flex items-center justify-end px-6">

     <!-- LOGOUT -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
            class="flex items-center gap-1.5 px-3 py-2 rounded-lg
                   text-red-600 hover:bg-red-50 hover:text-red-700 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 16l4-4m0 0l-4-4m4 4H7"/>
            </svg>
            Logout
        </button>
    </form>

</header>


        <!-- CONTENT -->
        <main class="flex-1 p-6">
            <div class="bg-white rounded-xl shadow-sm p-6">
                @yield('content')
            </div>
        </main>

    </div>

</div>

</body>
</html>
