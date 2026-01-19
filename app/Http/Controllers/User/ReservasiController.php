<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use App\Models\Studio;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    // LIST RESERVASI USER
    public function index()
    {
        Reservasi::updateStatusSelesai();

        $reservasi = Reservasi::with('studio','jadwal','pembayaran')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('users.reservasi.index', compact('reservasi'));
    }

    // HALAMAN BUAT RESERVASI
    public function create($studio)
    {
        $studio = Studio::findOrFail($studio);
        return view('users.reservasi.create', compact('studio'));
    }

    // SIMPAN RESERVASI
    public function store(Request $request)
    {
        $request->validate([
            'studio_id'   => 'required|exists:studios,id',
            'tanggal'     => 'required|date',
            'jam_dimulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
        ]);

        /* =============================
           VALIDASI JAM OPERASIONAL
        ============================== */
        $mulaiMenit   = strtotime($request->jam_dimulai);
        $selesaiMenit = strtotime($request->jam_selesai);

        if (
            $mulaiMenit < strtotime('09:00') ||
            $selesaiMenit > strtotime('22:00') ||
            $selesaiMenit <= $mulaiMenit
        ) {
            return back()->withErrors('Jam reservasi tidak valid (09.00 – 22.00)');
        }

        /* =============================
           CEK BENTROK JADWAL (FIX)
        ============================== */
        $bentrok = Jadwal::where('studio_id', $request->studio_id)
            ->where('tanggal', $request->tanggal)
            ->where('status', 'booked')
            ->where(function ($q) use ($request) {
                $q->whereRaw('? < jam_selesai AND ? > jam_dimulai', [
                    $request->jam_dimulai,
                    $request->jam_selesai
                ]);
            })
            ->exists();

        if ($bentrok) {
            return back()->withErrors('Studio sudah dibooking di jam tersebut');
        }

        /* =============================
           HITUNG TOTAL
        ============================== */
        $studio = Studio::findOrFail($request->studio_id);
        $durasiJam = (strtotime($request->jam_selesai) - strtotime($request->jam_dimulai)) / 3600;
        $total = $durasiJam * $studio->harga_per_jam;

        /* =============================
           SIMPAN JADWAL
        ============================== */
        $jadwal = Jadwal::create([
            'studio_id'   => $request->studio_id,
            'tanggal'     => $request->tanggal,
            'jam_dimulai' => $request->jam_dimulai,
            'jam_selesai' => $request->jam_selesai,
            'status'      => 'booked',
        ]);

        /* =============================
           SIMPAN RESERVASI
        ============================== */
        $reservasi = Reservasi::create([
            'user_id'     => Auth::id(),
            'studio_id'   => $request->studio_id,
            'jadwal_id'   => $jadwal->id,
            'total_biaya' => $total,
            'status'      => 'pending',
        ]);

        return redirect()
            ->route('users.pembayaran.create', $reservasi->id)
            ->with('success', 'Reservasi berhasil dibuat, silakan lakukan pembayaran.');
    }

    // JADWAL TERBOOKING (AJAX)
    public function jadwalTerbooking(Request $request)
    {
        $request->validate([
            'studio_id' => 'required',
            'tanggal'   => 'required|date',
        ]);

        $jadwal = Jadwal::where('studio_id', $request->studio_id)
            ->where('tanggal', $request->tanggal)
            ->where('status', 'booked')
            ->get(['jam_dimulai','jam_selesai']);

        $jadwal->transform(function ($item) {
            $item->jam_dimulai = substr($item->jam_dimulai, 0, 5);
            $item->jam_selesai = substr($item->jam_selesai, 0, 5);
            return $item;
        });

        return response()->json($jadwal);
    }

    public function show($id)
    {
        $reservasi = Reservasi::with('studio', 'jadwal', 'pembayaran')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('users.reservasi.show', compact('reservasi'));
    }

    public function struk($id)
    {
        Reservasi::updateStatusSelesai();

        $reservasi = Reservasi::with('user', 'studio', 'jadwal', 'pembayaran')
            ->where('user_id', Auth::id())
            ->whereIn('status', ['dibayar', 'selesai'])
            ->findOrFail($id);

        return view('users.reservasi.struk', compact('reservasi'));
    }
}
