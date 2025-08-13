<?php

namespace App\Livewire\Guru;

use App\Models\Guru;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage(); // reset halaman saat mencari
    }

    public function render()
    {
        $gurus = Guru::query()
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                      ->orWhere('jurusan', 'like', '%' . $this->search . '%');
            })
            ->paginate($this->perPage);

        return view('livewire.guru.index', compact('gurus'));
    }
}
