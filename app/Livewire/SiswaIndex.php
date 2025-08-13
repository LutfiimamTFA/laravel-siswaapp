<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\Jurusan;

class SiswaIndex extends Component
{
    public $daftarKelas = [];
    public $kelasFilter = '';

    public function mount()
    {
        // Ambil daftar kelas unik dari tabel jurusans (kolom: kelas)
        $this->daftarKelas = Jurusan::whereNotNull('kelas')
            ->orderBy('kelas')
            ->pluck('kelas')
            ->unique()
            ->values()
            ->toArray();
    }

    public function render()
    {
        $query = Siswa::with(['jurusan.guru']); // pastikan relasi sudah ada

        if (!empty($this->kelasFilter)) {
            $query->whereHas('jurusan', function ($q) {
                $q->where('kelas', $this->kelasFilter);
            });
        }

        $siswas = $query->get();

        return view('livewire.siswa-index', compact('siswas'));
    }
}
