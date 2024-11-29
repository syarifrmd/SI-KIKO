<?php

// app/Models/RekamMedis.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id', 
        'user_id',
        'perawat_id', 
        'diagnosis', 
        'tindakan', 
        'tanggal',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
