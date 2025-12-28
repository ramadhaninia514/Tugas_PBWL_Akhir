<?php

namespace App\Http\Controllers;

use App\Models\Formmasuk;
use App\Models\Formpulang;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Total pegawai dari nama unik di form masuk
        $totalPegawai = Formmasuk::distinct('nama')->count('nama');

        $sudahAbsen = Formmasuk::whereDate('tanggal', Carbon::today())->count();
        $belumAbsen = $totalPegawai - $sudahAbsen;

        return view('admin.dashboard', compact(
            'totalPegawai',
            'sudahAbsen',
            'belumAbsen'
        ));
    }

    public function rekapAbsen(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $nama = $request->input('nama');

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

        // Pagination data masuk
        $dataMasuk = $dataMasuk
            ->orderBy('tanggal', 'desc')
            ->paginate(10)
            ->appends([
                'nama' => $nama,
                'tanggal' => $tanggal
            ]);

        // Data pulang (tanpa pagination)
        $dataPulang = $dataPulang->get();

        // Statistik
        $totalPegawai = Formmasuk::distinct('nama')->count('nama');
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
