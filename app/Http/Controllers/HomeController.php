<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Total seluruh karyawan
        $totalKaryawan = User::count();

        // Total izin karyawan
        $totalIzin = Izin::count();

        // Total izin yang di-approve
        $totalIzinApproved = Izin::where('status', 'Diterima')->count();

        // Total izin yang di-reject
        $totalIzinRejected = Izin::where('status', 'Ditolak')->count();

        return view('home', compact('totalKaryawan', 'totalIzin', 'totalIzinApproved', 'totalIzinRejected'));
    }
}
