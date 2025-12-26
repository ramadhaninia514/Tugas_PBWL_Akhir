<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal',
        'jam_masuk',
        'jam_pulang',
        'status',
    ];

    public $timestamps = true;
    // Relasi ke model User
    public function user()
    {
         return $this->belongsTo(User::class, 'user_id');
    }
}
