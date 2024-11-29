<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFotoPerawatToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   // database/migrations/xxxx_xx_xx_xxxxxx_add_foto_perawat_to_users_table.php
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('foto_perawat')->nullable();
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('foto_perawat');
    });
}

}
