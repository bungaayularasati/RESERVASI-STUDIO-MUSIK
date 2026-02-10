<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('chat_messages', function (Blueprint $table) {
            if (!Schema::hasColumn('chat_messages', 'user_id')) {
                $table->foreignId('user_id')->after('id')->constrained('users')->onDelete('cascade');
            }
        });

        DB::statement('UPDATE chat_messages cm JOIN chat_threads ct ON cm.thread_id = ct.id SET cm.user_id = ct.user_id');
    }

    public function down(): void
    {
        Schema::table('chat_messages', function (Blueprint $table) {
            if (Schema::hasColumn('chat_messages', 'user_id')) {
                $table->dropConstrainedForeignId('user_id');
            }
        });
    }
};

