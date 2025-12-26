<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formmasuk extends Model
{
    use HasFactory;

    protected $table = 'form_masuks';

    protected $fillable = [
        'nama',
        'tanggal',
        'jam_datang',
        'status',
        'keterangan',
        'foto_muka',
    ];
}
