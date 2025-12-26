<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        $names = [
            'Budi Santoso',
            'Siti Aminah',
            'Agus Pratama',
            'Rina Marlina',
            'Dedi Kurniawan'
        ];

        foreach ($names as $name) {
            Pegawai::create(['nama' => $name]);
        }
    }
}
