<x-guest-layout>
<div class="min-h-screen flex items-center justify-center
            bg-white px-4">


<div class="w-full max-w-md rounded-3xl bg-slate-900/80 backdrop-blur-xl
            border border-white/10 shadow-2xl p-8">

    <!-- ICON MUSIK -->
<div class="flex justify-center mb-6">
    <div class="bg-indigo-500/20 p-4 rounded-2xl">
        <svg class="w-10 h-10 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 19V6l12-2v13M9 19a3 3 0 11-6 0 3 3 0 016 0zm12-2a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
    </div>
</div>


    <h1 class="text-2xl font-bold text-center text-white">Daftar Studio Musik</h1>
    <p class="text-center text-sm text-gray-400 mb-6">
        Buat akun untuk mulai reservasi 🎶
    </p>

    @if ($errors->any())
        <div class="mb-4 rounded-xl bg-red-500/10 border border-red-500/30 p-3 text-sm text-red-300">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div>
            <label class="text-sm text-gray-300">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ old('nama') }}" required
                   class="mt-1 w-full rounded-xl bg-slate-800 border border-slate-700
                          text-white px-4 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                   placeholder="Nama Lengkap">
        </div>

        <div>
            <label class="text-sm text-gray-300">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   class="mt-1 w-full rounded-xl bg-slate-800 border border-slate-700
                          text-white px-4 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                   placeholder="email@example.com">
        </div>

        <div>
            <label class="text-sm text-gray-300">Password</label>
            <input type="password" name="password" required
                   class="mt-1 w-full rounded-xl bg-slate-800 border border-slate-700
                          text-white px-4 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                   placeholder="••••••••">
        </div>

        <div>
            <label class="text-sm text-gray-300">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required
                   class="mt-1 w-full rounded-xl bg-slate-800 border border-slate-700
                          text-white px-4 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                   placeholder="••••••••">
        </div>

        <button class="w-full py-3 rounded-xl font-semibold text-white
                       bg-gradient-to-r from-indigo-500 to-violet-600
                       hover:from-indigo-600 hover:to-violet-700 transition">
            Daftar
        </button>
    </form>

    <p class="mt-6 text-center text-sm text-gray-400">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-indigo-400 font-semibold hover:underline">
            Login
        </a>
    </p>
</div>
</div>
</x-guest-layout>
