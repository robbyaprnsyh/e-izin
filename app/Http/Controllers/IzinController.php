<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class IzinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $izin = Izin::with(['karyawan'])->where('id_karyawan', Auth::user()->id)->get();
        confirmDelete('Hapus izin!', 'Apakah anda yakin?');
        return view('izin.index', compact('izin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function menu()
    {
        $izin = Izin::latest()->get();
        $izinNotifications = Izin::where('status', 'Menunggu')->get();

        // Hitung total hari izin untuk setiap record izin
        foreach ($izin as $item) {
            $tanggalMulai = \Carbon\Carbon::parse($item->tgl_mulai);
            $tanggalAkhir = \Carbon\Carbon::parse($item->tgl_selesai);
            $item->total_hari_izin = $tanggalMulai->diffInDays($tanggalAkhir) + 1; // +1 agar tanggal mulai juga terhitung
        }

        return view('izin.menu', compact('izin', 'izinNotifications'));
    }
    public function create()
    {
        return view('izin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'tgl_mulai' => ['required', 'date', 'after_or_equal:today'],
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
            'alasan' => 'required|string|max:255',
        ], [
            'tgl_mulai.after_or_equal' => 'Tanggal yang di masukan tidak valid', // Pesan khusus
            'tgl_selesai.after_or_equal' => 'Tanggal selesai cuti harus setelah atau sama dengan tanggal mulai cuti.',
        ]);

        // Simpan data cuti ke database
        Izin::create([
            'id_karyawan' => Auth::id(),
            'tgl_mulai' => $validated['tgl_mulai'], // Menyimpan tanggal mulai
            'tgl_selesai' => $validated['tgl_selesai'], // Menyimpan tanggal selesai
            'alasan' => $validated['alasan'], // Menyimpan alasan
            'status' => 'Menunggu', // Status "Menunggu Konfirmasi"
        ]);
        Alert::success('Succes', 'Izin Berhasil Di Ajukan')->autoClose(1500);
        return redirect()->route('izin.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function approve($id)
    {
        $izin = Izin::findOrFail($id);
        $izin->status = 'Diterima';
        $izin->save();

        Alert::success('Succes', 'Izin berhasil diterima')->autoClose(1500);
        return redirect()->back();
    }

    public function reject($id)
    {
        $izin = Izin::findOrFail($id);
        $izin->status = 'Ditolak';
        $izin->save();

        Alert::success('Succes', 'Izin ditolak')->autoClose(1500);
        return redirect()->back();
    }
}