<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use App\Models\Studio;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        Reservasi::updateStatusSelesai();

        $reservasi = Reservasi::with(['user', 'studio', 'jadwal'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.reservasi.index', compact('reservasi'));
    }

    public function show(Reservasi $reservasi)
    {
        $reservasi->load(['user', 'studio', 'jadwal']);
        return view('admin.reservasi.show', compact('reservasi'));
    }

    public function selesai(Reservasi $reservasi)
    {
        if ($reservasi->status !== 'dibayar') {
            return back()->with('error', 'Hanya reservasi yang sudah dibayar (berjalan) yang bisa diselesaikan secara manual.');
        }

        // 1. Update status reservasi
        $reservasi->update([
            'status' => 'selesai'
        ]);

        // 2. Release jadwal agar bisa dibooking orang lain (Early Finish)
        if ($reservasi->jadwal) {
            $reservasi->jadwal->update([
                'status' => 'kosong'
            ]);
        }

        return redirect()
            ->route('admin.reservasi.index')
            ->with('success', 'Reservasi diselesaikan secara manual & jadwal telah dibuka kembali.');
    }

    public function update(Request $request, Reservasi $reservasi)
    {
        $request->validate([
            'status' => 'required|in:batal'
        ]);

        if (in_array($reservasi->status, ['selesai', 'batal'])) {
            return redirect()
                ->route('admin.reservasi.index')
                ->with('error', 'Reservasi ini tidak dapat diubah statusnya.');
        }

        $reservasi->update([
            'status' => 'batal'
        ]);

        return redirect()
            ->route('admin.reservasi.index')
            ->with('success', 'Reservasi berhasil dibatalkan');
    }
    public function destroy($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->delete();

        return redirect()
            ->route('admin.reservasi.index')
            ->with('success', 'Reservasi berhasil dihapus');
    }

    public function laporan(Request $request)
    {
        Reservasi::updateStatusSelesai();

        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');
        $studioId = $request->input('studio_id');

        $studioList = Studio::orderBy('nama_studio')->get();

        $reservasiQuery = Reservasi::with('studio')
            ->whereIn('status', ['dibayar', 'selesai']);

        if ($tanggalMulai) {
            $reservasiQuery->whereDate('created_at', '>=', $tanggalMulai);
        }

        if ($tanggalSelesai) {
            $reservasiQuery->whereDate('created_at', '<=', $tanggalSelesai);
        }

        if ($studioId) {
            $reservasiQuery->where('studio_id', $studioId);
        }

        $reservasi = $reservasiQuery->orderBy('created_at', 'asc')->get();

        $totalPendapatan = $reservasi->sum('total_biaya');

        $pendapatanPerStudio = $reservasi
            ->groupBy('studio_id')
            ->map(function ($items) {
                return [
                    'studio' => $items->first()->studio,
                    'total' => $items->sum('total_biaya'),
                ];
            });

        return view('admin.laporan.pendapatan', compact(
            'reservasi',
            'totalPendapatan',
            'pendapatanPerStudio',
            'studioList',
            'tanggalMulai',
            'tanggalSelesai',
            'studioId'
        ));
    }

}
