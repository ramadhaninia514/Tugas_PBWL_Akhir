<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formpulang extends Model
{
    use HasFactory;

    protected $table = 'form_pulangs';

    protected $fillable = [
        'nama',
        'tanggal',
        'jam_pulang',
        'foto_muka',
    ];
}
