<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Karyawan;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Role User
        $role = Role::firstOrCreate(['name' => 'user']);

        // Role Admin
        $role = Role::firstOrCreate(['name' => 'admin']);

        // Seeder Admin
        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
        $admin->assignRole('admin');

        // Profile Admin
        $karyawan = Karyawan::create(([
            'id_user' => $admin->id,
            'id_jabatan' => 1,
            'nik' => '32123456789',
            'no_telp' => '08123456789',
            'tgl_lahir' => '1991-01-01',
            'jenis_kelamin' => 'Laki - laki',
            'alamat' => 'Bandung',
            'agama' => 'Islam',
            'cover' => 'default.jpeg',
        ]));
    }
}
