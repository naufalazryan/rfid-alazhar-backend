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
        Schema::create('siswa', function (Blueprint $table) {
            $table->bigIncrements('id_siswa');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_kelas');
            $table->string('nama_siswa');
            $table->char('nis', 9)->unique();
            $table->text('alamat');
            $table->integer('telp');
            $table->enum('jenis_kelamin', ['pria', 'wanita']);

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
