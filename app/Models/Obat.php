<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $guarded = [''];

    protected $casts = [
        'expired_date' => 'datetime', 
    ];
}
