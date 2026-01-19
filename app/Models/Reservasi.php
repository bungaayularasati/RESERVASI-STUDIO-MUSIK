<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $fillable = [
        'user_id',
        'studio_id',
        'jadwal_id',
        'tanggal_reservasi',
        'total_biaya',
        'status',
        'status_pembayaran'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function studio()
    {
        return $this->belongsTo(Studio::class);
    }


    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }

    public static function updateStatusSelesai()
    {
        static::where('status', 'dibayar')
            ->whereHas('pembayaran', function ($query) {
                $query->where('status', 'valid');
            })
            ->whereHas('jadwal', function ($query) {
                $query->whereRaw("TIMESTAMP(tanggal, jam_selesai) <= NOW()");
            })
            ->update(['status' => 'selesai']);
    }
}
