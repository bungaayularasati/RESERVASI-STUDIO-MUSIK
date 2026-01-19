<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center px-4 bg-gray-50">
        <div class="max-w-5xl w-full grid md:grid-cols-2 gap-12 items-center">

            <!-- LEFT CONTENT -->
            <div>
                <p class="text-sm font-semibold text-indigo-700 tracking-wide mb-3">
                    Reservasi Studio Musik Online
                </p>

                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight">
                    Atur jadwal latihan band
                    <span class="block text-indigo-600">
                        lebih mudah dan terorganisir
                    </span>
                </h1>

                <p class="mt-5 text-sm md:text-base text-gray-600 leading-relaxed">
                    Pilih studio, cek jadwal kosong, dan lakukan reservasi kapan saja.
                    Tanpa chat manual, semua tercatat rapi dalam satu sistem.
                </p>

                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center justify-center px-6 py-2.5 rounded-xl
                              text-sm font-semibold bg-indigo-600 hover:bg-indigo-700
                              text-white shadow-lg transition">
                        Masuk untuk reservasi
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center justify-center px-6 py-2.5 rounded-xl
                                  text-sm font-semibold border border-indigo-600
                                  text-indigo-600 hover:bg-indigo-600 hover:text-white transition">
                            Daftar akun baru
                        </a>
                    @endif
                </div>

                <div class="mt-6 flex flex-wrap gap-4 text-xs text-gray-600">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span>Booking real-time tanpa antrian</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                        <span>Riwayat reservasi & pembayaran otomatis</span>
                    </div>
                </div>
            </div>

            <!-- RIGHT CARD -->
            <div class="space-y-4">

                <div class="rounded-2xl bg-slate-900 border border-white/10 shadow-2xl p-5 text-sm text-gray-200">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <p class="text-xs text-gray-400">Studio tersedia</p>
                            <p class="text-lg font-semibold text-white">
                                Studio A, B, C, D, E, F
                            </p>
                        </div>
                        <div class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-semibold">
                            Siap digunakan
                        </div>
                    </div>
                    <p class="text-xs text-gray-300">
                        Cocok untuk latihan band, rekaman ringan,
                        hingga persiapan tampil di panggung.
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4 text-xs">
                    <div class="rounded-2xl bg-slate-900 border border-white/10 p-4">
                        <p class="text-2xl mb-1">🗓️</p>
                        <p class="font-semibold text-white">
                            Pilih tanggal & jam
                        </p>
                        <p class="mt-1 text-[11px] text-gray-300">
                            Lihat slot kosong dan booking dalam beberapa klik.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-slate-900 border border-white/10 p-4">
                        <p class="text-2xl mb-1">💳</p>
                        <p class="font-semibold text-white">
                            Pembayaran tertata
                        </p>
                        <p class="mt-1 text-[11px] text-gray-300">
                            Upload bukti bayar & pantau status verifikasi.
                        </p>
                    </div>
                </div>

                <p class="text-[11px] text-gray-500 text-center">
                    Buat akun dan lakukan reservasi pertama kamu hari ini.
                </p>
            </div>

        </div>
    </div>
</x-guest-layout>
