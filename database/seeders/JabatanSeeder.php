<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    public function run(): void
    {
        $jabatan = [
            ['id' => 1, 'nama_jabatan' => 'Bos'],
            ['id' => 2, 'nama_jabatan' => 'Manager'],
            ['id' => 3, 'nama_jabatan' => 'Karyawan'],
            ['id' => 4, 'nama_jabatan' => 'Direktur'],
            ['id' => 5, 'nama_jabatan' => 'CEO'],
            ['id' => 6, 'nama_jabatan' => 'HRD'],
            ['id' => 7, 'nama_jabatan' => 'CFO'],
            ['id' => 8, 'nama_jabatan' => 'CIO'],
            ['id' => 9, 'nama_jabatan' => 'CMO'],
            ['id' => 10, 'nama_jabatan' => 'TI'],
            ['id' => 11, 'nama_jabatan' => 'OB'],
        ];
        // masukkan data ke database
        DB::table('jabatans')->insert($jabatan);
    }
}
