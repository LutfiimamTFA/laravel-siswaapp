<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\LaporanController;
use App\Livewire\Siswa\Index;
use App\Livewire\Siswa\Create;
use App\Livewire\Siswa\Edit;


Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('siswa', SiswaController::class)->middleware(['auth']);
Route::resource('jurusan', JurusanController::class)->middleware(['auth']);
Route::resource('guru', GuruController::class)->middleware(['auth']);;

Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/kelas/{kelas}', [SiswaController::class, 'byKelas'])->name('siswa.byKelas');
Route::get('/guru/kelas/{kelas}', [GuruController::class, 'byKelas'])->name('guru.byKelas');
Route::get('/laporan/siswa-kelas-guru', [SiswaController::class, 'laporan'])->name('laporan.siswaKelasGuru');

Route::get('/laporan/siswa-per-kelas/{kelas}', [LaporanController::class, 'siswaByKelas'])->name('laporan.siswa.kelas');
Route::get('/laporan/guru-per-kelas/{kelas}', [LaporanController::class, 'guruByKelas'])->name('laporan.guru.kelas');
Route::get('/laporan/siswa-kelas-guru', [LaporanController::class, 'siswaKelasGuru'])->name('laporan.siswa.kelas.guru');
Route::get('/laporan/siswa/jurusan/{jurusanId}', [LaporanController::class, 'siswaByJurusan'])->name('laporan.siswaByJurusan');

// AJAX untuk ambil data kelas dan guru
Route::get('/get-kelas/{jurusan_id}', [SiswaController::class, 'getKelas']);
Route::get('/get-guru/{kelas_id}', [SiswaController::class, 'getGuru']);





Route::get('/siswa', Index::class)->name('siswa.index');
Route::get('/siswa/create', Create::class)->name('siswa.create');

});

require __DIR__.'/auth.php';
