<?php

// app/Models/Perawat.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perawat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 
        'nip',
        'jenis_kelamin',
        'foto_perawat',

    ];

    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class);
    }
}

