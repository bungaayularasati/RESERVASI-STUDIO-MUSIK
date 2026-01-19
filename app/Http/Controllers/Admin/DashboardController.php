<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Studio;
use App\Models\Jadwal;
use App\Models\Reservasi;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total studio
        $totalStudio = Studio::count();

        // Hitung total jadwal
        $totalJadwal = Jadwal::count();

        // Hitung reservasi pending
        $reservasiPending = Reservasi::where('status', 'pending')->count();

        // Hitung validasi pembayaran (misal status = "menunggu-validasi")
        $validasiPembayaran = Reservasi::where('status_pembayaran', 'menunggu')->count();

        return view('admin.dashboard', compact(
            'totalStudio',
            'totalJadwal',
            'reservasiPending',
            'validasiPembayaran'
        ));
    }
}
