<?php

namespace App\Http\Controllers;

use App\Models\Formmasuk;
use App\Models\Formpulang;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalPegawai = Pegawai::count();
        $sudahAbsen = Formmasuk::whereDate('tanggal', Carbon::today())->count();
        $belumAbsen = $totalPegawai - $sudahAbsen;

        return view('admin.dashboard', compact('totalPegawai', 'sudahAbsen', 'belumAbsen'));
    }

    public function rekapAbsen(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $nama = $request->input('nama');

        // Query data masuk
        $dataMasuk = Formmasuk::query();
        $dataPulang = Formpulang::query();

        // Filter nama
        if (!empty($nama)) {
            $dataMasuk->where('nama', 'like', "%$nama%");
            $dataPulang->where('nama', 'like', "%$nama%");
        }

        // Filter tanggal
        if (!empty($tanggal)) {
            $dataMasuk->whereDate('tanggal', $tanggal);
            $dataPulang->whereDate('tanggal', $tanggal);
        }

        // Pagination untuk data masuk
        $dataMasuk = $dataMasuk
            ->orderBy('tanggal', 'desc')
            ->paginate(10) // jumlah data per halaman
            ->appends([
                'nama' => $nama,
                'tanggal' => $tanggal
            ]);

        // Data pulang tetap ambil semua (tidak di-paginate)
        $dataPulang = $dataPulang->get();

        // Hitung total pegawai, absen hari ini, dan belum absen
        $totalPegawai = Pegawai::count();
        $absenHariIni = Formmasuk::whereDate('tanggal', Carbon::today())->count();
        $belumAbsen = $totalPegawai - $absenHariIni;

        return view('admin.rekap', compact(
            'dataMasuk',
            'dataPulang',
            'totalPegawai',
            'absenHariIni',
            'belumAbsen',
            'nama',
            'tanggal'
        ));
    }
}
