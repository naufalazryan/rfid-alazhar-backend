<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kartu_siswa', function (Blueprint $table) {
            $table->bigIncrements('id_kartu_s');
            $table->unsignedBigInteger('id_siswa');
            $table->char('uid', 12)->unique();
            $table->timestamps();

            $table->foreign('id_siswa')->references('id_siswa')->on('siswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartu_siswa');
    }
};
