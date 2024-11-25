<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::role('user')->with('karyawan')->get();
        confirmDelete('Hapus User!', 'Apakah anda yakin?');
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|min:8',
            'nik' => 'required|string|max:15',
            'no_telp' => 'required|string|max:12',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:15',
            'alamat' => 'required|string',
            'agama' => 'required|string|max:10',
            'cover' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole('user');

        $karyawan = Karyawan::create([
            'id_user' => $user->id,
            'nik' => $request->nik,
            'no_telp' => $request->no_telp,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'cover' => $request->cover,
        ]);

        // upload image
        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/karyawan', $name);
            $karyawan->cover = $name;
        }

        Alert::success('Succes', 'Data Berhasil Di Tambahkan')->autoClose(1500);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail( $id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required|string|min:8',
            'nik' => 'required|string|max:15',
            'no_telp' => 'required|string|max:12',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:15',
            'alamat' => 'required|string',
            'agama' => 'required|string|max:10',
            'cover' => 'nullable',
        ]);

        $user = User::findOrFail([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->assignRole('user');

        $karyawan = Karyawan::findOrFail([
            'id_user' => $user->id,
            'nik' => $request->nik,
            'no_telp' => $request->no_telp,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'cover' => $request->cover,
        ]);

        // upload image
        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/karyawan', $name);
            $karyawan->cover = $name;
        }

        Alert::success('Succes', 'Data Berhasil Di Ubah')->autoClose(1500);
        return view('user.index', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail(id: $id);
        $user->delete();
        Alert::success('Succes', 'Data Berhasil Di Hapus')->autoClose(1500);
        return redirect()->route('user.index');
    }
}
