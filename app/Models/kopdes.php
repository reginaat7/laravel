<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kopdes extends Model
{
    //
    use HasFactory;

    protected $table = 'kopdes';
    protected $primaryKey = 'id_kopdes';

    protected $fillable = [
        'nama_toko_kopdes',
        'nama_manajer',
        'alamat',
        'tanggal_berdiri',
        'foto_kopdes',
    ];
}
