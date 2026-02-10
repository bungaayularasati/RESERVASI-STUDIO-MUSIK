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
<aside class="w-64 h-screen fixed
              bg-gradient-to-b from-indigo-600 to-indigo-800
              text-white shadow-lg">

    <!-- LOGO -->
    <div class="h-16 flex items-center justify-center bg-indigo-700 shadow">
        <img src="{{ asset('images/studio_a.jpg') }}" class="w-8 h-8 mr-2 rounded">
        <span class="font-bold text-lg">Studio Musik</span>
    </div>

    <!-- MENU -->
    <nav class="mt-6">
        <ul class="space-y-1">
            @php
                $latest = \Illuminate\Support\Facades\DB::table('chat_messages')
                    ->select('user_id', \Illuminate\Support\Facades\DB::raw('MAX(created_at) as last_time'))
                    ->groupBy('user_id')
                    ->get();
                $chatUnread = $latest->filter(function($row){
                    $last = \App\Models\ChatMessage::where('user_id', $row->user_id)->orderBy('created_at','desc')->first();
                    return $last && $last->sender_role === 'users';
                })->count();
            @endphp

            <!-- Dashboard -->
            <li>
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded
                          hover:bg-indigo-700 transition
                          font-semibold
                          {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-700 text-white' : 'text-indigo-100' }}">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l9-9 9 9M4 10v10a1 1 0 001 1h5m4 0h5a1 1 0 001-1V10"/>
                    </svg>

                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Data Studio -->
            <li>
                <a href="{{ route('admin.studio.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded
                          hover:bg-indigo-700 transition
                          font-semibold
                          {{ request()->routeIs('admin.studio.*') ? 'bg-indigo-700 text-white' : 'text-indigo-100' }}">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 21h18M5 21V7l8-4 6 4v14"/>
                    </svg>

                    <span>Data Studio</span>
                </a>
            </li>

            <!-- Jadwal -->
            <li>
                <a href="{{ route('admin.jadwal.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded
                          hover:bg-indigo-700 transition
                          font-semibold
                          {{ request()->routeIs('admin.jadwal.*') ? 'bg-indigo-700 text-white' : 'text-indigo-100' }}">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>

                    <span>Jadwal</span>
                </a>
            </li>

            <!-- Data User -->
            <li>
                <a href="{{ route('admin.users.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded
                          hover:bg-indigo-700 transition
                          font-semibold
                          {{ request()->routeIs('admin.users.*') ? 'bg-indigo-700 text-white' : 'text-indigo-100' }}">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-4a4 4 0 100-8 4 4 0 000 8z"/>
                    </svg>

                    <span>Data User</span>
                </a>
            </li>

            <!-- Chat -->
            <li>
                <a href="{{ route('admin.chat.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded
                          hover:bg-indigo-700 transition
                          font-semibold
                          {{ request()->routeIs('admin.chat.*') ? 'bg-indigo-700 text-white' : 'text-indigo-100' }}">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M7 8h10M7 12h6m5 8l-4-4H7a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v8"/>
                    </svg>

                    <span>Chat</span>
                    @if($chatUnread > 0)
                        <span class="text-[11px] px-2 py-0.5 rounded-full bg-red-500 text-white">
                            {{ $chatUnread }}
                        </span>
                    @endif
                </a>
            </li>

            <!-- Reservasi -->
            <li>
                <a href="{{ route('admin.reservasi.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded
                          hover:bg-indigo-700 transition
                          font-semibold
                          {{ request()->routeIs('admin.reservasi.*') ? 'bg-indigo-700 text-white' : 'text-indigo-100' }}">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0"/>
                    </svg>

                    <span>Reservasi</span>
                </a>
            </li>

            <!-- Pembayaran -->
            <li>
                <a href="{{ route('admin.pembayaran.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded
                          hover:bg-indigo-700 transition
                          font-semibold
                          {{ request()->routeIs('admin.pembayaran.*') ? 'bg-indigo-700 text-white' : 'text-indigo-100' }}">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 10h18M7 15h2m-6 4h18a2 2 0 002-2V7a2 2 0 00-2-2H3a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>

                    <span>Pembayaran</span>
                </a>
            </li>

            <!-- Laporan -->
            <li>
                <a href="{{ route('admin.laporan.pendapatan') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded
                          hover:bg-indigo-700 transition
                          font-semibold
                          {{ request()->routeIs('admin.laporan.*') ? 'bg-indigo-700 text-white' : 'text-indigo-100' }}">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 17v-6m4 6V7m4 10V11"/>
                    </svg>

                    <span>Laporan</span>
                </a>
            </li>

        </ul>
    </nav>
</aside>

<!-- MAIN -->
<div class="flex-1 ml-64 flex flex-col">

<!-- NAVBAR -->
<header class="h-16 bg-indigo-600 shadow flex items-center justify-end px-6">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
            class="flex items-center gap-2 px-3 py-2 rounded-lg
                   text-white hover:bg-white/20 transition">
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
