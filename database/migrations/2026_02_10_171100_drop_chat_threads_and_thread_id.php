<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('chat_messages') && Schema::hasColumn('chat_messages', 'thread_id')) {
            Schema::table('chat_messages', function (Blueprint $table) {
                $table->dropConstrainedForeignId('thread_id');
            });
        }

        if (Schema::hasTable('chat_threads')) {
            Schema::drop('chat_threads');
        }
    }

    public function down(): void
    {
        if (!Schema::hasTable('chat_threads')) {
            Schema::create('chat_threads', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
                $table->string('status')->default('open');
                $table->timestamps();
            });
        }

        if (!Schema::hasColumn('chat_messages', 'thread_id')) {
            Schema::table('chat_messages', function (Blueprint $table) {
                $table->foreignId('thread_id')->constrained('chat_threads')->onDelete('cascade');
            });
        }
    }
};

