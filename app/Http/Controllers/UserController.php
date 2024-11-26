<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        // $user = User::role('user')->with('karyawan')->get()->paginate(5);
        $user = User::role('user')->with('karyawan')->paginate(5);
        confirmDelete('Hapus User!', 'Apakah anda yakin?');
        return view('user.index', compact('user'));
    }

    public function create()
    {
        $jabatan = Jabatan::all();
        return view('user.create', compact('jabatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|min:8',
            'nik' => 'required|string|max:15|unique:karyawans',
            'no_telp' => 'required|string|max:12',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:15',
            'alamat' => 'required|string',
            'agama' => 'required|string|max:10',
            'cover' => 'required',
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
            'id_jabatan' => $request->id_jabatan,
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
            $img->move(public_path('images/karyawan'), $name);
            $karyawan->cover = $name;
            $karyawan->save();
        }

        Alert::success('Succes', 'Data Berhasil Di Tambahkan !')->autoClose(1500);
        return redirect()->route('user.index');
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required',
        //     'password' => 'required|string|min:8',
        //     'nik' => 'required|string|max:15',
        //     'no_telp' => 'required|string|max:12',
        //     'tgl_lahir' => 'required|date',
        //     'jenis_kelamin' => 'required|string|max:15',
        //     'alamat' => 'required|string',
        //     'agama' => 'required|string|max:10',
        //     'cover' => 'nullable',
        // ]);

        // $user = User::findOrFail([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        // ]);
        // $user->assignRole('user');

        // $karyawan = Karyawan::findOrFail([
        //     'id_user' => $user->id,
        //     'nik' => $request->nik,
        //     'id_jabatan' => $request->id_jabatan,
        //     'no_telp' => $request->no_telp,
        //     'tgl_lahir' => $request->tgl_lahir,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        //     'alamat' => $request->alamat,
        //     'agama' => $request->agama,
        //     'cover' => $request->cover,
        // ]);

        // // upload image
        // if ($request->hasFile('cover')) {
        //     $img = $request->file('cover');
        //     $name = rand(1000, 9999) . $img->getClientOriginalName();
        //     $img->move('images/karyawan', $name);
        //     $karyawan->cover = $name;
        // }
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'nik' => 'required|string|max:15|unique:karyawans',
            'no_telp' => 'required|string|max:12',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:15',
            'alamat' => 'required|string',
            'agama' => 'required|string|max:10',
            'cover' => 'nullable|image',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $karyawan = $user->karyawan; // Ambil relasi karyawan
        $karyawan->update([
            'nik' => $request->nik,
            'no_telp' => $request->no_telp,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
        ]);

        if ($request->hasFile('cover')) {
            if ($karyawan->cover && file_exists(public_path('images/karyawan/' . $karyawan->cover))) {
                unlink(public_path('images/karyawan/' . $karyawan->cover));
            }
            // Simpan file cover baru
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move(public_path('images/karyawan'), $name);
            $karyawan->cover = $name;
            $karyawan->save();
        }

        Alert::success('Succes', 'Data Berhasil Di Ubah !')->autoClose(1500);
        return redirect()->route('user.index', compact('user'));
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail(id: $id);
        if ($user->karyawan) {
            $karyawan = $user->karyawan;
            // Hapus semua izin yang terkait dengan karyawan
            Izin::where('id_karyawan', $karyawan->id)->delete();

            // Periksa apakah ada cover dan file cover tersebut ada
            if ($karyawan->cover && file_exists(public_path('images/karyawan/' . $karyawan->cover))) {
                // Hapus file cover
                unlink(public_path('images/karyawan/' . $karyawan->cover));
                // Hapus data karyawan
            }
            $karyawan->delete();
        }
        $user->delete();
        Alert::success('Succes', 'Data Berhasil Di Hapus !')->autoClose(1500);
        return redirect()->route('user.index');
    }
}
