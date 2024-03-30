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
        Schema::create('log_kartu_siswa', function (Blueprint $table) {
            $table->bigIncrements('id_log_kartu_s');
            $table->unsignedBigInteger('id_kartu_s');
            $table->boolean('status')->default(false);
            $table->timestamp('waktu_interaksi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('keterangan', ['hadir', 'izin', 'sakit'])->default('hadir');
            $table->foreign('id_kartu_s')->references('id_kartu_s')->on('kartu_siswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_kartu_siswa');
    }
};
