<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * HALAMAN PEMBAYARAN
     */
    public function create($reservasiId)
    {
        $reservasi = Reservasi::with('studio','jadwal','pembayaran')
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->whereDoesntHave('pembayaran')
            ->findOrFail($reservasiId);

        return view('users.pembayaran.create', compact('reservasi'));
    }

    /**
     * SIMPAN PEMBAYARAN (UPLOAD BUKTI)
     */
    public function store(Request $request)
    {
        $request->validate([
            'reservasi_id'   => 'required|exists:reservasis,id',
            'bukti_transfer' => 'required|image|max:2048',
        ]);

        $reservasi = Reservasi::with('pembayaran')
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->findOrFail($request->reservasi_id);

        // Cegah double pembayaran
        if ($reservasi->pembayaran) {
            return redirect()
                ->route('users.reservasi.show', $reservasi->id)
                ->with('error', 'Reservasi ini sudah memiliki pembayaran.');
        }

        // Simpan bukti transfer
        $buktiPath = $request->file('bukti_transfer')
            ->store('bukti_transfer', 'public');

        // Simpan pembayaran
        Pembayaran::create([
            'reservasi_id'   => $reservasi->id,
            'metode'         => 'Transfer Bank',
            'bukti_transfer' => $buktiPath,
            'status'         => 'menunggu',
        ]);

        return redirect()
            ->route('users.reservasi.show', $reservasi->id)
            ->with('success', 'Bukti pembayaran berhasil dikirim. Menunggu verifikasi admin.');
    }
}
