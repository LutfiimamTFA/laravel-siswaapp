<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\guru;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // 5. List Siswa berdasarkan kelasnya
    public function siswaByKelas($kelas)
    {
        $jurusan = Jurusan::where('kelas', $kelas)->with('siswa')->first();
        return view('laporan.siswa_by_kelas', [
            'siswa' => $jurusan ? $jurusan->siswa : collect(),
            'kelas' => $kelas
        ]);
    }

    // 6. List Guru berdasarkan kelasnya
    public function guruByKelas($kelas)
    {
        $jurusan = Jurusan::where('kelas', $kelas)->with('guru')->first();
        return view('laporan.guru_by_kelas', [
            'guru' => $jurusan ? $jurusan->guru : null,
            'kelas' => $kelas
        ]);
    }

    // 7. List Siswa, Kelas dan Guru
    public function siswaKelasGuru()
    {
        $siswa = Siswa::with('jurusan.guru')->get();
        return view('laporan.siswa_kelas_guru', compact('siswa'));
    }
}
