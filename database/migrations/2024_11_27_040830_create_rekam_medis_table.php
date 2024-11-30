<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_rekam_medis_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamMedisTable extends Migration
{
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasiens'); // Foreign key ke tabel pasiens
            $table->foreignId('perawat_id')->constrained('perawats'); // Foreign key ke tabel perawats
            $table->text('diagnosis');
            $table->text('tindakan');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rekam_medis');
    }
}
