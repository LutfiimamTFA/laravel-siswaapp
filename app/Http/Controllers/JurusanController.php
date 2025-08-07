<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Guru;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
public function index(Request $request)
{
    $query = Jurusan::with('guru')
        ->join('gurus', 'jurusans.guru_id', '=', 'gurus.id')
        ->select('jurusans.*') // pastikan hanya ambil kolom dari jurusans
        ->orderBy('jurusans.kelas');

    // Filter kelas jika ada input
    if ($request->has('kelas') && $request->kelas != '') {
        $query->where('jurusans.kelas', $request->kelas);
    }

    $jurusans = $query->get();

    // Ambil daftar kelas unik untuk dropdown
    $daftarKelas = Jurusan::select('kelas')->distinct()->pluck('kelas');

    return view('jurusan.index', compact('jurusans', 'daftarKelas'));
}


    public function create()
    {
        $gurus = Guru::all();
        return view('jurusan.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required|string|max:255',
            'guru_id' => 'nullable|exists:gurus,id',
        ]);

        Jurusan::create($request->only('kelas', 'guru_id'));

        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil ditambahkan.');
    }

    public function edit(Jurusan $jurusan)
    {
        $gurus = Guru::all();
        return view('jurusan.edit', compact('jurusan', 'gurus'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'kelas' => 'required|string|max:255',
            'guru_id' => 'nullable|exists:gurus,id',
        ]);

        $jurusan->update($request->only('kelas', 'guru_id'));

        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil diperbarui.');
    }

    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil dihapus.');
    }
}
