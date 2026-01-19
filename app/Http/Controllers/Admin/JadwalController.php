<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Studio;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        Reservasi::updateStatusSelesai();
        Jadwal::releaseCompletedBookings();
        $jadwal = Jadwal::with('studio')
            ->whereDate('tanggal', '>=', now()->toDateString())
            ->orderBy('tanggal', 'asc')
            ->orderBy('jam_dimulai', 'asc')
            ->get();
        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $studio = Studio::all();
        return view('admin.jadwal.create', compact('studio'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'studio_id'   => 'required',
            'tanggal'     => 'required|date',
            'jam_dimulai' => 'required',
            'jam_selesai' => 'required',
            'status'      => 'required|in:kosong,booked',
        ]);

        Jadwal::create([
            'studio_id'   => $request->studio_id,
            'tanggal'     => $request->tanggal,
            'jam_dimulai' => $request->jam_dimulai,
            'jam_selesai' => $request->jam_selesai,
            'status'      => $request->status,
        ]);

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $studio = Studio::all();
        return view('admin.jadwal.edit', compact('jadwal', 'studio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'studio_id'   => 'required',
            'tanggal'     => 'required|date',
            'jam_dimulai' => 'required',
            'jam_selesai' => 'required',
            'status'      => 'required|in:kosong,booked',
        ]);

        Jadwal::where('id', $id)->update([
            'studio_id'   => $request->studio_id,
            'tanggal'     => $request->tanggal,
            'jam_dimulai' => $request->jam_dimulai,
            'jam_selesai' => $request->jam_selesai,
            'status'      => $request->status,
        ]);

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Jadwal::findOrFail($id)->delete();
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}
