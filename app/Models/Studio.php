<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    protected $fillable = [
        'nama_studio',
        'harga_per_jam',
        'kapasitas',
        'fasilitas',
        'foto'
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
}
