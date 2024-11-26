<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryawanController extends Controller
{
    public function index()
    {
        $user = User::all();
        $karyawan = Karyawan::where('id_user', Auth::id())->first();
        confirmDelete('Hapus Karyawan!', 'Apakah anda yakin?');
        return view('karyawan.index', compact('karyawan', 'user'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
