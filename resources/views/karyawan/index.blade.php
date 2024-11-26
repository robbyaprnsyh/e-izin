@extends('layouts.admin')
@section('content')
<div class="bg-white rounded-lg shadow-md mt-4 flex items-center justify-center">
    <p class="mb-2 mt-2 text-xl font-semibold text-black dark:text-gray-300">
        Profile
    </p>
</div>
<div class="px-4 py-3 mb-8 mt-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="flex w-full mx-auto">
            <div class="flex-shrink-0 mr-6 ml-6 mt-8">
                <img src="{{ asset('images/karyawan/' . $karyawan->cover) }}" alt="{{ $karyawan->cover }}"
                    class= "w-44 h-40 border-2 rounded-lg">
            </div>
            <div class="flex-grow ml-6">
                <label class="block text-sm mt-2">
                    <div class="flex items-center w-full">
                        <span class="text-gray-700 dark:text-gray-400 w-1/4 mr-6"><b>Nama :</b></span>
                        <p class="w-3/4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            {{ $karyawan->user->name }}
                        </p>
                    </div>
                </label>
                <label class="block text-sm mt-2">
                    <div class="flex items-center w-full">
                        <span class="text-gray-700 dark:text-gray-400 w-1/4 mr-6"><b>Jabatan :</b></span>
                        <p class="w-3/4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            {{ $karyawan->jabatan->nama_jabatan }}
                        </p>
                    </div>
                </label>
                <label class="block text-sm mt-2">
                    <div class="flex items-center w-full">
                        <span class="text-gray-700 dark:text-gray-400 w-1/4 mr-6"><b>NIK :</b></span>
                        <p class="w-3/4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            {{ $karyawan->nik }}
                        </p>
                    </div>
                </label>
                <label class="block text-sm mt-2">
                    <div class="flex items-center w-full">
                        <span class="text-gray-700 dark:text-gray-400 w-1/4 mr-6"><b>No Telepon :</b></span>
                        <p class="w-3/4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            {{ $karyawan->no_telp }}
                        </p>
                    </div>
                </label>
                <label class="block text-sm mt-2">
                    <div class="flex items-center w-full">
                        <span class="text-gray-700 dark:text-gray-400 w-1/4 mr-6"><b>Tanggal Lahir :</b></span>
                        <p class="w-3/4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            {{ $karyawan->tgl_lahir }}
                        </p>
                    </div>
                </label>
                <label class="block text-sm mt-2">
                    <div class="flex items-center w-full">
                        <span class="text-gray-700 dark:text-gray-400 w-1/4 mr-6"><b>Jenis Kelamin :</b></span>
                        <p class="w-3/4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            {{ $karyawan->jenis_kelamin }}
                        </p>
                    </div>
                </label>
                <label class="block text-sm mt-2">
                    <div class="flex items-center w-full">
                        <span class="text-gray-700 dark:text-gray-400 w-1/4 mr-6"><b>Alamat :</b></span>
                        <p class="w-3/4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            {{ $karyawan->alamat }}
                        </p>
                    </div>
                </label>
                <label class="block text-sm mt-2">
                    <div class="flex items-center w-full">
                        <span class="text-gray-700 dark:text-gray-400 w-1/4 mr-6"><b>Agama :</b></span>
                        <p class="w-3/4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            {{ $karyawan->agama }}
                        </p>
                    </div>
                </label>
            </div>
        </div>
    </div>
@endsection
