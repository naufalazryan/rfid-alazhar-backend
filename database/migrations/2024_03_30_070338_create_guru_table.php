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
            Schema::create('guru', function (Blueprint $table) {
                $table->bigIncrements('id_guru');
                $table->char('nip', 9)->unique();
                $table->string('nama_guru');
                $table->enum('jk', ['pria', 'wanita']);
                $table->string('jabatan');
                $table->string('tempat_lahir');
                $table->date('tgl_lahir');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('guru');
        }
    };
