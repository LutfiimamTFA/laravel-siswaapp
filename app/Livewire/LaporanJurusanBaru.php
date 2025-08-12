<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Jurusan;
use App\Models\Guru;
use App\Models\Siswa;

class LaporanJurusanBaru extends Component
{
    public $jurusanList;
    public $selectedJurusanTemp = null;
    public $selectedJurusan = null;
    public $kelasDetail = null;

    public $showConfirmModal = false;
    public $showData = false;

    public $guruList;
    public $siswaList;

    public function mount()
    {
        // Ambil semua jurusan / kelas
        $this->jurusanList = Jurusan::all();
        $this->guruList = collect();
        $this->siswaList = collect();
    }

    // Saat klik kelas, simpan sementara dan munculkan modal konfirmasi
    public function confirmJurusan($jurusanId)
    {
        $this->selectedJurusanTemp = $jurusanId;
        $this->kelasDetail = Jurusan::find($jurusanId);
        $this->showConfirmModal = true;
    }

    // Konfirmasi pilih kelas, load guru dan siswa
public function confirmSelectedJurusan()
{
    $this->selectedJurusan = $this->selectedJurusanTemp;
    $this->showConfirmModal = false;

    // Ambil detail kelas + relasi guru
    $this->kelasDetail = Jurusan::with('guru')->find($this->selectedJurusan);

    // Kalau guru ada, simpan di guruList
    $this->guruList = $this->kelasDetail->guru 
        ? collect([$this->kelasDetail->guru]) 
        : collect();

    // Siswa sesuai jurusan
    $this->siswaList = Siswa::where('jurusan_id', $this->selectedJurusan)->get();

    $this->showData = true;
}


    public function render()
    {
        return view('livewire.laporan-jurusan-baru');
    }
}
