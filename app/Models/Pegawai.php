<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika sudah sesuai konvensi Laravel: plural dan lowercase)
    protected $table = 'pegawais';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'nama',
        'status',
    ];

    // Jika created_at dan updated_at digunakan, biarkan default true
    public $timestamps = true;
}

