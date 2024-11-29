<?php
// app/Models/Pasien.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 
        'alamat', 
        'tanggal_lahir',
        'ruangan_pasien',
        'created_at',
        'foto_pasien',
    ];

    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class);
    }
}
