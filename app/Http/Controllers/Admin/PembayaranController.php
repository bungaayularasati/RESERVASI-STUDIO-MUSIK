<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('reservasi.user','reservasi.studio','reservasi.jadwal')
            ->latest()
            ->get();

        return view('admin.pembayaran.index', compact('pembayaran'));
    }
    // 📄 LIHAT BUKTI PEMBAYARAN
    public function bukti($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        if (!$pembayaran->bukti_transfer) {
            abort(404, 'Bukti pembayaran tidak ada');
        }

        $path = storage_path('app/public/' . $pembayaran->bukti_transfer);

        if (!file_exists($path)) {
            abort(404, 'File bukti tidak ditemukan');
        }

        return response()->file($path);
    }


    // ✅ VALIDASI
    public function validasi($id)
    {
        DB::transaction(function () use ($id) {

            $pembayaran = Pembayaran::with('reservasi.jadwal')->findOrFail($id);

            $pembayaran->update([
                'status' => 'valid'
            ]);

            $pembayaran->reservasi->update([
                'status' => 'dibayar',
                'status_pembayaran' => 'valid'
            ]);

            if ($pembayaran->reservasi && $pembayaran->reservasi->jadwal) {
                $pembayaran->reservasi->jadwal->update([
                    'status' => 'booked'
                ]);
            }
        });

        return back()->with('success', 'Pembayaran divalidasi');
    }

    // ❌ DITOLAK
    public function invalid($id)
    {
        $pembayaran = Pembayaran::with('reservasi.jadwal')->findOrFail($id);

        DB::transaction(function () use ($pembayaran) {
            $pembayaran->update([
                'status' => 'invalid'
            ]);

            if ($pembayaran->reservasi) {
                // Update status reservasi menjadi batal
                $pembayaran->reservasi->update([
                    'status_pembayaran' => 'gagal',
                    'status' => 'batal'
                ]);

                // Release jadwal agar bisa dibooking orang lain
                if ($pembayaran->reservasi->jadwal) {
                    $pembayaran->reservasi->jadwal->update([
                        'status' => 'kosong'
                    ]);
                }
            }
        });

        return back()->with('error', 'Pembayaran ditolak, reservasi dibatalkan & jadwal dibuka kembali.');
    }
}
