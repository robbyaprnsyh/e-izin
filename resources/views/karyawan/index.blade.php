@extends('layouts.admin')
@section('content')
    <div class="mt-4">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Data Profile
        </h4>
    </div>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm mt-2">
            <span class="text-gray-700 dark:text-gray-400"><b>Nama :</b></span>
            <p
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                {{ $karyawan->user->name }}
            </p>
        </label>
        <label class="block text-sm mt-2">
            <span class="text-gray-700 dark:text-gray-400"><b>Jabatan :</b></span>
            <p
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                {{ $karyawan->jabatan->nama_jabatan }}
            </p>
        </label>
        <label class="block text-sm mt-2">
            <span class="text-gray-700 dark:text-gray-400"><b>NIK :</b></span>
            <p
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                {{ $karyawan->nik }}
            </p>
        </label>
        <label class="block text-sm mt-2">
            <span class="text-gray-700 dark:text-gray-400"><b>No Telepon :</b></span>
            <p
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                {{ $karyawan->no_telp }}
            </p>
        </label>
        <label class="block text-sm mt-2">
            <span class="text-gray-700 dark:text-gray-400"><b>Tanggal Lahir :</b></span>
            <p
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                {{ $karyawan->tgl_lahir }}
            </p>
        </label>
        <label class="block text-sm mt-2">
            <span class="text-gray-700 dark:text-gray-400"><b>Jenis Kelamin :</b></span>
            <p
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                {{ $karyawan->jenis_kelamin }}
            </p>
        </label>
        <label class="block text-sm mt-2">
            <span class="text-gray-700 dark:text-gray-400"><b>Alamat :</b></span>
            <p
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                {{ $karyawan->alamat }}
            </p>
        </label>
        <label class="block text-sm mt-2 mb-2">
            <span class="text-gray-700 dark:text-gray-400"><b>Agama :</b></span>
            <p
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                {{ $karyawan->agama }}
            </p>
        </label>
    </div>
@endsection
