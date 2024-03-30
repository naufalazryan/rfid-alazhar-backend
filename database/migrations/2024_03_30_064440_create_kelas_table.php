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
        Schema::create('kelas', function (Blueprint $table) {
            $table->bigIncrements('id_kelas');
            $table->unsignedBigInteger('id_jurusan');
            $table->unsignedBigInteger('id_angkatan');
            $table->unsignedBigInteger('id_subkelas');
            $table->timestamps();

            $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusan')->onDelete('cascade');
            $table->foreign('id_angkatan')->references('id_angkatan')->on('angkatan')->onDelete('cascade');
            $table->foreign('id_subkelas')->references('id_subkelas')->on('subkelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
