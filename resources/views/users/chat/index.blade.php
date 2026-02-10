@extends('layouts.user')

@section('content')
<div class="max-w-3xl mx-auto mt-8">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl shadow-lg overflow-hidden">

        <div class="p-4 border-b border-slate-800">
            <h1 class="text-xl font-bold text-white">Chat Admin</h1>
            <p class="text-sm text-slate-400">Tanyakan apa saja tentang reservasi studio</p>
        </div>

        <div class="p-4 space-y-3 max-h-[60vh] overflow-y-auto">
            @forelse($messages as $m)
                <div class="flex {{ $m->sender_role === 'users' ? 'justify-end' : 'justify-start' }}">
                    <div class="max-w-[70%] rounded-lg px-3 py-2 text-sm
                        {{ $m->sender_role === 'users' ? 'bg-indigo-600 text-white' : 'bg-slate-800 text-slate-200 border border-slate-700' }}">
                        <div>{{ $m->message }}</div>
                        <div class="text-xs mt-1 {{ $m->sender_role === 'users' ? 'text-right text-slate-400' : 'text-slate-400' }}">
                            {{ $m->sender_role === 'users' ? 'Anda' : 'Admin' }} • {{ $m->created_at->setTimezone('Asia/Jakarta')->format('d M Y H:i') }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-slate-400 text-sm">Belum ada percakapan. Mulai bertanya di bawah.</div>
            @endforelse
        </div>

        <form method="POST" action="{{ route('users.chat.store') }}" class="p-4 border-t border-slate-800 flex gap-2">
            @csrf
            <input type="text" name="message" placeholder="Tulis pesan..."
                   class="flex-1 rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white focus:ring-2 focus:ring-indigo-500"
                   required>
            <button type="submit"
                    class="px-4 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-sm font-semibold text-white transition">
                Kirim
            </button>
        </form>
    </div>
</div>
@endsection
