<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = [
        'nama',
        'nim',
        'prodi_id',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}