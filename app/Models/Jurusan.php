<?php

// app/Models/Jurusan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = ['kelas', 'guru_id'];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    
}
