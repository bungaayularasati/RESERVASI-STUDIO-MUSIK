@extends('layouts.admin')

@section('content')
<div class="p-6 bg-white min-h-screen rounded-lg shadow">
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold">
                {{ strtoupper(substr($user->nama,0,1)) }}
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Chat dengan {{ $user->nama }}</h1>
                <div class="text-xs text-gray-500">Percakapan langsung dengan pelanggan</div>
            </div>
        </div>
        <a href="{{ route('admin.chat.index') }}"
           class="bg-gray-200 px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-300 transition">
            Kembali
        </a>
    </div>

    <div id="messages" class="border rounded-lg p-4 mb-4 max-h-[60vh] overflow-y-auto bg-gray-50">
        @forelse($messages as $m)
            <div class="flex {{ $m->sender_role === 'admin' ? 'justify-end' : 'justify-start' }} mb-3">
                <div class="max-w-[70%]">
                    <div class="{{ $m->sender_role === 'admin' ? 'bg-indigo-600 text-white' : 'bg-white text-gray-800 border border-gray-200' }} px-4 py-2 rounded-2xl shadow">
                        {{ $m->message }}
                    </div>
                    <div class="text-xs mt-1 {{ $m->sender_role === 'admin' ? 'text-right text-gray-500' : 'text-gray-500' }}">
                        {{ $m->sender_role === 'admin' ? 'Admin' : $user->nama }} • {{ $m->created_at->setTimezone('Asia/Jakarta')->format('d M Y H:i') }}
                    </div>
                </div>
            </div>
        @empty
            <div class="text-gray-400 text-sm">Belum ada percakapan.</div>
        @endforelse
    </div>

    <form method="POST" action="{{ route('admin.chat.reply', $user->id) }}" class="flex gap-3">
        @csrf
        <input type="text" name="message" placeholder="Tulis balasan..."
               class="flex-1 rounded-xl border border-gray-300 px-4 py-2 text-sm focus:ring-2 focus:ring-indigo-500 bg-white"
               required>
        <button type="submit"
                class="px-5 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-sm font-semibold text-white transition">
            Kirim
        </button>
    </form>
</div>

<script>
    const box = document.getElementById('messages');
    if (box) box.scrollTop = box.scrollHeight;
</script>
@endsection
