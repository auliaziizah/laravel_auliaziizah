<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'no_telepon',
        'id_rumah_sakit'
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'id_rumah_sakit', 'id');
    }
}
