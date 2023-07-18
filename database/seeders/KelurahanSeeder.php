<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'nama_kelurahan' => 'Cipadung',
            'nama_kecamatan' => 'Cibiru',
            'nama_kota' => 'Bandung',
        ];
        DB::table('table_kelurahan')->insert($data);
    }
}
