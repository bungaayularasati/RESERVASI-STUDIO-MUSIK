@extends('layouts.admin')

@section('content')
<div class="p-6 bg-white min-h-screen rounded-lg shadow">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Percakapan Pelanggan</h1>
    </div>

    @if($threads->isEmpty())
        <div class="bg-indigo-50 border border-indigo-200 text-indigo-700 rounded-lg p-4">
            Belum ada percakapan. Pelanggan yang mengirim pesan akan muncul di sini.
        </div>
    @else
        <div class="space-y-3">
            @foreach($threads as $t)
                <div class="flex items-center justify-between p-4 rounded-xl border border-gray-200 hover:border-indigo-300 hover:shadow transition bg-white">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold">
                            {{ strtoupper(substr($t->nama,0,1)) }}
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-gray-900">{{ $t->nama }}</span>
                                <span class="text-xs px-2 py-0.5 rounded-full
                                    {{ $t->status === 'open' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                    {{ ucfirst($t->status) }}
                                </span>
                                @if($t->last_time)
                                    <span class="text-xs text-gray-400">• {{ $t->last_time->diffForHumans() }}</span>
                                @endif
                            </div>
                            <div class="text-sm text-gray-600 line-clamp-1 max-w-xl">
                                {{ $t->last_message }}
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('admin.chat.show', $t->user_id) }}"
                       class="px-4 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-sm font-semibold text-white transition">
                        Buka
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
