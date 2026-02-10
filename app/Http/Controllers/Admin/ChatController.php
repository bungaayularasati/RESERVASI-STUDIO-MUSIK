<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function index()
    {
        $latestPerUser = DB::table('chat_messages as cm')
            ->select('cm.user_id', DB::raw('MAX(cm.created_at) as last_time'))
            ->groupBy('cm.user_id')
            ->get();

        $threads = $latestPerUser->map(function ($row) {
            $last = ChatMessage::where('user_id', $row->user_id)->orderBy('created_at', 'desc')->first();
            $user = User::find($row->user_id);
            return (object)[
                'user_id' => $user->id,
                'nama' => $user->nama,
                'status' => 'open',
                'last_message' => $last?->message,
                'last_time' => $last?->created_at,
            ];
        })->sortByDesc('last_time')->values();
        return view('admin.chat.index', compact('threads'));
    }

    public function showByUser(User $user)
    {
        $messages = ChatMessage::where('user_id', $user->id)->with('sender')->get();
        return view('admin.chat.show', compact('user', 'messages'));
    }

    public function reply(Request $request, User $user)
    {
        $request->validate([
            'message' => 'required|string|max:2000',
        ]);

        ChatMessage::create([
            'user_id'     => $user->id,
            'sender_id'   => Auth::id(),
            'sender_role' => 'admin',
            'message'     => $request->message,
        ]);

        return redirect()->route('admin.chat.show', $user->id);
    }
}
