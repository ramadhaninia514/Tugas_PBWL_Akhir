<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admins')->insert([
            'name' => 'Admin Kominfo',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'), // Gantilah password sesuai kebutuhan
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
