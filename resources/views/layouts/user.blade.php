<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Studio Musik Online</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @media print {
            nav,
            footer,
            form[action="{{ route('logout') }}"] {
                display: none !important;
            }
            .no-print {
                display: none !important;
            }
            body {
                background: #ffffff !important;
            }
            main {
                padding: 0 !important;
                max-width: 100% !important;
            }
        }
    </style>
</head>

<body class="min-h-screen flex flex-col bg-gray-100 text-gray-900">

    <!-- NAVBAR -->
    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">

            <!-- LOGO -->
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/studio_a.jpg') }}" class="w-8 h-8">

                <span class="font-semibold text-lg text-gray-800">
                    Studio Musik
                </span>
            </div>

           <!-- MENU -->
<div class="flex items-center gap-5 text-sm">

    <a href="{{ route('users.dashboard') }}"
       class="flex items-center gap-1.5 px-3 py-2 rounded-lg
              text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 transition">
        <!-- icon -->
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 12l2-2m0 0l7-7 7 7m-9 2v6"/>
        </svg>
        Dashboard
    </a>

    <a href="{{ route('users.studio') }}"
       class="flex items-center gap-1.5 px-3 py-2 rounded-lg
              text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 19V6l12-2v13"/>
        </svg>
        Studio
    </a>

    <a href="{{ route('users.reservasi.index') }}"
       class="flex items-center gap-1.5 px-3 py-2 rounded-lg
              text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7H3v12a2 2 0 002 2z"/>
        </svg>
        Reservasi
    </a>

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

</div>


        </div>
    </nav>

    <main class="flex-1 w-full">
        <div class="max-w-6xl mx-auto w-full px-4 py-8">
            @yield('content')
        </div>
    </main>

  <footer class="bg-slate-900 border-t border-slate-800 text-gray-400 text-xs py-5 text-center mt-auto">
    <p>
        &copy; {{ date('Y') }}
        <span class="text-indigo-400 font-semibold"> Studio Musik — Reservasi Online</span>
    </p>
</footer>


</body>
</html>
