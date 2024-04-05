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
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id_role');
            $table->string('nama_role');
        });

        DB::table('roles')->insert([
            [
                'nama_role' => 'Admin'
            ],
            [
                'nama_role' => 'Wali Kelas'
            ],
            [
                'nama_role' => 'Siswa'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
