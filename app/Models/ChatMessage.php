<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $fillable = ['user_id', 'sender_id', 'sender_role', 'message'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
