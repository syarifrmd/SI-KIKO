<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_perawats_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerawatsTable extends Migration
{
    public function up()
    {
        Schema::create('perawats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip')->unique();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perawats');
    }
}
