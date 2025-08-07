<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    // Nama tabel, jika tidak sesuai dengan plural Laravel
    protected $table = 'kelas';

    // Kolom yang boleh diisi
    protected $fillable = ['nama'];

    // Relasi ke siswa
    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }
}
