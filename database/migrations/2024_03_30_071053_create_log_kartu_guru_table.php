<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('log_kartu_guru', function (Blueprint $table) {
            $table->bigIncrements('id_log_kartu_g');
            $table->unsignedBigInteger('id_kartu_g');
            $table->boolean('status')->default(0);
            $table->timestamp('waktu')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('keterangan', ['-', 'izin', 'sakit'])->default('-');
            $table->foreign('id_kartu_g')->references('id_kartu_g')->on('kartu_guru')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_kartu_guru');
    }
};
