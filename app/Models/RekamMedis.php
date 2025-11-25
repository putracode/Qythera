<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{

    protected $guarded = [''];

    protected $casts = [
        'tanggal_rm' => 'date',
    ];


    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }


    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }
}
