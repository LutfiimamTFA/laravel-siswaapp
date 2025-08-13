<?php

namespace App\Livewire\Jurusan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Jurusan;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function searchNow()
    {
        $this->resetPage(); // agar halaman kembali ke 1
    }

    public function render()
    {
        $jurusans = Jurusan::with('guru')
            ->where(function ($query) {
                $query->where('kelas', 'like', '%' . $this->search . '%')
                      ->orWhereHas('guru', function ($q) {
                          $q->where('nama', 'like', '%' . $this->search . '%')
                            ->orWhere('jurusan', 'like', '%' . $this->search . '%');
                      });
            })
            ->orderBy('kelas')
            ->paginate(10);

        return view('livewire.jurusan.index', [
            'jurusans' => $jurusans
        ]);
    }
}
