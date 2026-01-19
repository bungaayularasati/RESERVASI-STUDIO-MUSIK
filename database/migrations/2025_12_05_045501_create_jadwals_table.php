<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('studio_id')->constrained('studios')->onDelete('cascade');
            $table->date('tanggal');
            $table->time('jam_dimulai');
            $table->time('jam_selesai');
            $table->enum('status', ['kosong', 'booked'])->default('kosong');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('jadwals');
    }
};
