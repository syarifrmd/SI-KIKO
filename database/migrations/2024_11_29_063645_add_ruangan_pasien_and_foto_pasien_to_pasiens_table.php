<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRuanganPasienAndFotoPasienToPasiensTable extends Migration
{
    /**
     * Menjalankan migrasi untuk menambahkan kolom ke tabel pasien.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pasiens', function (Blueprint $table) {
            // Menambahkan kolom untuk ruangan pasien (tipe string)
            $table->string('ruangan_pasien')->nullable()->after('alamat'); // Menambahkan setelah kolom 'alamat'

            // Menambahkan kolom untuk foto pasien (tipe string untuk menyimpan path file)
            $table->string('foto_pasien')->nullable()->after('tanggal_lahir'); // Menambahkan setelah kolom 'tanggal_lahir'
        });
    }

    /**
     * Membalikkan perubahan pada migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pasiens', function (Blueprint $table) {
            // Menghapus kolom yang ditambahkan
            $table->dropColumn('ruangan_pasien');
            $table->dropColumn('foto_pasien');
        });
    }
}
