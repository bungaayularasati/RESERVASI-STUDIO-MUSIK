<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $messages = ChatMessage::where('user_id', Auth::id())->with('sender')->get();
        return view('users.chat.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:2000',
        ]);

        ChatMessage::create([
            'user_id'     => Auth::id(),
            'sender_id'   => Auth::id(),
            'sender_role' => 'users',
            'message'     => $request->message,
        ]);

        return redirect()->route('users.chat.index');
    }
}
