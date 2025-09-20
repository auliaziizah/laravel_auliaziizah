<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hospitals')->insert([
            [
                'id' => 1,
                'nama' => 'RS Umum Kebonjati',
                'alamat' => 'Jl. Kebonjati No. 152 Kel. Kebon Jeruk Kec. Andir kota Bandung',
                'email' => 'kebonjati@gmail.com',
                'telepon' => '0226014058',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nama' => 'RS Umum Advent Bandung',
                'alamat' => 'Jl. Cihampelas No. 161 Bandung',
                'email' => 'advent@gmail.com',
                'telepon' => '0222034386',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nama' => 'RS Umum Pusat Dr. Hasan Sadikin',
                'alamat' => 'Jl. Pasteur No. 38 Bandung',
                'email' => 'rshs@gmail.com',
                'telepon' => '0222034953',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);     
    }
}
