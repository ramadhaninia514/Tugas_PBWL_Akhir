<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formmasuk;
use App\Models\Formpulang;
use App\Models\User;
use App\Models\Pegawai;
use App\Http\Controllers\Controller;

class AbsensiController extends Controller
{
    // ================== TAMPILKAN FORM ===================

public function formMasuk()
{
    return view('attendance.form_masuk');
}

public function formPulang()
{
    return view('attendance.form_pulang');
}


    // ================== SIMPAN DATA ABSEN MASUK ===================

    public function storeMasuk(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam_datang' => 'required|date_format:H:i',
            'status' => 'required|in:Hadir,Izin,Sakit,Tanpa Keterangan',
            'keterangan' => 'nullable|string',
            'foto_muka' => 'nullable|string',
        ]);

        // Jika kosong, set jadi string kosong
        $validated['keterangan'] = $validated['keterangan'] ?? '';
        $validated['foto_muka'] = $validated['foto_muka'] ?? '';

        Formmasuk::create($validated);

        // Redirect ke halaman welcome setelah simpan
        return redirect()->route('welcome')->with('success', 'Absensi masuk berhasil disimpan.');
    }

    // ================== SIMPAN DATA ABSEN PULANG ===================

    public function storePulang(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam_pulang' => 'required|date_format:H:i',
            'status' => 'required|in:Hadir,Izin,Sakit,Tanpa Keterangan',
            'keterangan' => 'nullable|string',
            'foto_muka' => 'nullable|string',
        ]);

        Formpulang::create($validated);

        return redirect()->route('welcome')->with('success', 'Absensi pulang berhasil disimpan.');
    }
}
