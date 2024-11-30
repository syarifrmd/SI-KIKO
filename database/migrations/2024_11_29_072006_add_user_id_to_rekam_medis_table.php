<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToRekamMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rekam_medis', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();  // Add user_id column
        });
    }
    
    public function down()
    {
        Schema::table('rekam_medis', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
    
}
