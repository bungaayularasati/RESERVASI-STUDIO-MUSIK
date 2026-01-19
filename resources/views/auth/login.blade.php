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


    <h1 class="text-2xl font-bold text-center text-white">Login Studio Musik</h1>
    <p class="text-center text-sm text-gray-400 mb-6">
        Kelola reservasi studio 🎧
    </p>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <label class="text-sm text-gray-300">Email</label>
            <input type="email" name="email" required autofocus
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

        <div class="flex justify-between text-sm text-gray-400">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="remember"
                       class="rounded border-gray-600 text-indigo-500">
                Ingat saya
            </label>

            <a href="{{ route('password.request') }}" class="text-indigo-400 hover:underline">
                Lupa password?
            </a>
        </div>

        <button class="w-full py-3 rounded-xl font-semibold text-white
                       bg-black hover:bg-gray-900 transition">
            Login
        </button>
    </form>

    <p class="mt-6 text-center text-sm text-gray-400">
        Belum punya akun?
        <a href="{{ route('register') }}" class="text-indigo-400 font-semibold hover:underline">
            Daftar
        </a>
    </p>
</div>
</div>
</x-guest-layout>
