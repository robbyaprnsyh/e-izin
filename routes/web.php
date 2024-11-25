<?php

use App\Http\Controllers\IzinController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route Profile
    // Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    // Route::get('profile/create', [ProfileController::class, 'create'])->name('profile.create');
    // Route::post('profile', [ProfileController::class, 'store'])->name('profile.store');
    // Route::get('profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    // Route::get('profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::put('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route Jabatan
    Route::get('jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
    Route::get('jabatan/create', [JabatanController::class, 'create'])->name('jabatan.create');
    Route::post('jabatan', [JabatanController::class, 'store'])->name('jabatan.store');
    Route::get('jabatan/{id}', [JabatanController::class, 'show'])->name('jabatan.show');
    Route::get('jabatan/{id}/edit', [JabatanController::class, 'edit'])->name('jabatan.edit');
    Route::put('jabatan/{id}', [JabatanController::class, 'update'])->name('jabatan.update');
    Route::delete('jabatan/{id}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');

    // Route User
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user', [UserController::class, 'store'])->name('user.store');
    Route::get('user/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // Route Karyawan
    Route::get('karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::get('karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
    Route::post('karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::get('karyawan/{id}', [KaryawanController::class, 'show'])->name('karyawan.show');
    Route::get('karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::put('karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
    Route::delete('karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

    Route::get('izin/menu', [IzinController::class, 'menu'])->name('izin.menu');
    Route::put('/izin/approve/{id}', [IzinController::class, 'approve'])->name('izin.approve');
    Route::put('/izin/reject/{id}', [IzinController::class, 'reject'])->name('izin.reject');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    // Route Izin
    Route::get('izin', [IzinController::class, 'index'])->name('izin.index');
    Route::get('izin/create', [IzinController::class, 'create'])->name('izin.create');
    Route::post('izin', [IzinController::class, 'store'])->name('izin.store');
    Route::get('izin/{id}', [IzinController::class, 'show'])->name('izin.show');
    Route::get('izin/{id}/edit', [IzinController::class, 'edit'])->name('izin.edit');
    Route::put('izin/{id}', [IzinController::class, 'update'])->name('izin.update');
    Route::delete('izin/{id}', [IzinController::class, 'destroy'])->name('izin.destroy');
});

Route::get('/password/edit/{id}', [PasswordController::class, 'edit'])->name('password.edit');
Route::put('/password/update/{id}', [PasswordController::class, 'update'])->name('password.update');
// Route::put('/password/update/{id}', [PasswordController::class, 'update'])->name('password.update1');
