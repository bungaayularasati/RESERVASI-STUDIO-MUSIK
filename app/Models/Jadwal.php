<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'studio_id',
        'tanggal',
        'jam_dimulai',
        'jam_selesai',
        'status'
    ];

    public function studio()
    {
        return $this->belongsTo(Studio::class);
    }

    public function reservasi()
{
    return $this->hasOne(Reservasi::class);
}

    public static function releaseCompletedBookings()
    {
        static::where('status', 'booked')
            ->whereHas('reservasi', function ($q) {
                $q->where('status', 'selesai');
            })
            ->whereRaw("TIMESTAMP(tanggal, jam_selesai) <= NOW()")
            ->update(['status' => 'kosong']);
    }

}
