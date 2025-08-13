<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Siswa;
use App\Models\Jurusan;

class Index extends Component
{
    use WithPagination;

    public $kelas = '';
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingKelas()
    {
        $this->resetPage();
    }

    public function searchData()
    {
        $this->resetPage();
    }

    public function render()
    {
        $daftarKelas = Jurusan::pluck('kelas')->unique();

        $siswas = Siswa::with(['jurusan.guru'])
        ->when($this->search, fn($q) =>
    $q->where(function ($qq) {
        $qq->where('nama', 'like', '%' . $this->search . '%')
           ->orWhere('nis', 'like', '%' . $this->search . '%')
           ->orWhereHas('jurusan', fn($jr) =>
                $jr->where('kelas', 'like', '%' . $this->search . '%') // ganti sesuai kolom tabel jurusans
           )
           ->orWhereHas('jurusan.guru', fn($g) =>
                $g->where('jurusan', 'like', '%' . $this->search . '%')
           );
    })
)

            ->paginate(10);

        return view('livewire.siswa.index', [
            'siswas' => $siswas,
            'daftarKelas' => $daftarKelas
        ]);
    }
}
