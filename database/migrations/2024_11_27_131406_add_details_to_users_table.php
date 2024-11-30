<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  // database/migrations/xxxx_xx_xx_xxxxxx_add_details_to_users_table.php
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('nip')->unique()->nullable();
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
        $table->date('tanggal_masuk')->nullable();
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['nip', 'jenis_kelamin', 'tanggal_masuk']);
    });
}

}
