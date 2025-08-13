<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\Jurusan;

class Create extends Component
{
    public $nama, $nis, $jurusan_id;

    protected $rules = [
        'nama' => 'required|string|max:255',
        'nis' => 'required|numeric|unique:siswas,nis',
        'jurusan_id' => 'required|exists:jurusans,id',
    ];

    public function save()
    {
        $this->validate();

        Siswa::create([
            'nama' => $this->nama,
            'nis' => $this->nis,
            'jurusan_id' => $this->jurusan_id,
        ]);

        session()->flash('success', 'Siswa berhasil ditambahkan.');
        return redirect()->route('siswa.index');
    }

    public function render()
    {
        return view('livewire.siswa.create', [
            'jurusans' => Jurusan::all()
        ]);
    }
}
