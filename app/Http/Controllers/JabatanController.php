<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::paginate(5);
        confirmDelete('Hapus Jabatan!', 'Apakah anda yakin?');
        return view('jabatan.index', compact('jabatan'));
    }

    public function create()
    {
        return view('jabatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|unique:jabatans,nama_jabatan',
        ]);

        $jabatan = new Jabatan;
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->save();
        Alert::success('Succes', 'Data Berhasil Di Tambahkan !')->autoClose(1500);
        return redirect()->route('jabatan.index');
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
        $jabatan = Jabatan::findOrFail(id: $id);
        $jabatan->delete();
        Alert::success('Succes', 'Data Berhasil Di Hapus !')->autoClose(1500);
        return redirect()->route('jabatan.index');
    }
}
