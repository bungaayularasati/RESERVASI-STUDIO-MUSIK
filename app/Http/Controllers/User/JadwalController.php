<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Studio;
use App\Models\Reservasi;

class JadwalController extends Controller
{
    public function index($studioId)
    {
        $studio = Studio::findOrFail($studioId);

        Reservasi::updateStatusSelesai();
        Jadwal::releaseCompletedBookings();
        $jadwal = Jadwal::where('studio_id', $studioId)
            ->orderBy('tanggal', 'asc')
            ->orderBy('jam_dimulai', 'asc')
            ->get();

        return view('users.jadwal.index', compact('jadwal', 'studio'));
    }
}
