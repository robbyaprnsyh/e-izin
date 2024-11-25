<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatan = [
            ['nama_jabatan' => 'Manager'],
            ['nama_jabatan' => 'Karyawan'],
            ['nama_jabatan' => 'Direktur'],
            ['nama_jabatan' => 'CEO'],
            ['nama_jabatan' => 'HRD'],
            ['nama_jabatan' => 'CFO'],
            ['nama_jabatan' => 'CIO'],
            ['nama_jabatan' => 'CMO'],
            ['nama_jabatan' => 'TI'],
            ['nama_jabatan' => 'OB'],
        ];
        // masukkan data ke database
        DB::table('jabatans')->insert($jabatan);
    }
}
