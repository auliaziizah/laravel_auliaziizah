<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('patients')->insert([
            [
                'id' => 1,
                'nama' => 'Aulia',
                'alamat' => 'Jalan Sariasih 1 No 1',
                'no_telepon' => '081222875167',
                'id_rumah_sakit' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nama' => 'Agam',
                'alamat' => 'Jalan Sariasih 2 No 1',
                'no_telepon' => '081222875050',
                'id_rumah_sakit' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nama' => 'Paulina',
                'alamat' => 'Jalan Sariasih 3 No 1',
                'no_telepon' => '081222403050',
                'id_rumah_sakit' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nama' => 'Nurul',
                'alamat' => 'Jalan Sariasih 4 No 1',
                'no_telepon' => '081992879050',
                'id_rumah_sakit' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'nama' => 'Fathia',
                'alamat' => 'Jalan Sariasih 5 No 1',
                'no_telepon' => '081123875051',
                'id_rumah_sakit' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}