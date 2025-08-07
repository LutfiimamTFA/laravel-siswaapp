<?php

// app/Models/Guru.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nip', 'jurusan'];

    public function jurusans()
    {
        return $this->hasMany(Jurusan::class);
    }
}
