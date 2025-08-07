<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
public function index(Request $request)
{
    $query = Siswa::with(['jurusan.guru']); // ← pastikan guru di-load juga

    if ($request->filled('kelas')) {
        $query->whereHas('jurusan', function ($q) use ($request) {
            $q->where('kelas', $request->kelas);
        });
    }

    $siswas = $query->get();

    $daftarKelas = \App\Models\Jurusan::select('kelas')->distinct()->pluck('kelas');

    return view('siswa.index', compact('siswas', 'daftarKelas'));
}


    public function create()
    {
        // Ambil semua jurusan beserta guru pengampu-nya
        $jurusans = Jurusan::with('guru')->get();
        return view('siswa.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'        => 'required|string|max:255',
            'nis'         => 'required|string|max:50|unique:siswas',
            'jurusan_id'  => 'required|exists:jurusans,id',
        ]);

        Siswa::create([
            'nama'        => $request->nama,
            'nis'         => $request->nis,
            'jurusan_id'  => $request->jurusan_id,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function edit(Siswa $siswa)
    {
        $jurusans = Jurusan::with('guru')->get();
        return view('siswa.edit', compact('siswa', 'jurusans'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama'        => 'required|string|max:255',
            'nis'         => 'required|string|max:50|unique:siswas,nis,' . $siswa->id,
            'jurusan_id'  => 'required|exists:jurusans,id',
        ]);

        $siswa->update([
            'nama'        => $request->nama,
            'nis'         => $request->nis,
            'jurusan_id'  => $request->jurusan_id,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Siswa dihapus.');
    }
    public function siswaByKelas($kelas)
{
    $siswas = \App\Models\Siswa::whereHas('jurusan', function($q) use ($kelas) {
        $q->where('kelas', $kelas);
    })->with('jurusan')->get();

    return view('siswa.by-kelas', compact('siswas', 'kelas'));
}

}
