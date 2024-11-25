@extends('layouts.admin')
@section('content')
    <div class="mt-4">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Edit User
        </h4>
    </div>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400"><b>Nama User</b></span>
                <input name="name" type="text"
                    class=" @error('name') border-red-500 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    value="{{ $user->name }}">
                @error('name')
                    <span class="text-red-500 text-sm mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400"><b>Email</b></span>
                <input name="email" type="email"
                    class=" @error('email') border-red-500 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    value="{{ $user->email }}">
                @error('email')
                    <span class="text-red-500 text-sm mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400"><b>Password</b></span>
                <input name="password" type="password"
                    class=" @error('password') border-red-500 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    value="{{ $user->password }}">
                @error('password')
                    <span class="text-red-500 text-sm mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400"><b>NIK</b></span>
                <input name="nik" type="number"
                    class=" @error('nik') border-red-500 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    value="{{ $user->karyawan->nik }}">
                @error('nik')
                    <span class="text-red-500 text-sm mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400"><b>No Telepon</b></span>
                <input name="no_telp" type="text"
                    class=" @error('no_telp') border-red-500 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    value="{{ $user->karyawan->no_telp }}">
                @error('no_telp')
                    <span class="text-red-500 text-sm mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400"><b>Tanggal Lahir</b></span>
                <input name="tgl_lahir" type="date"
                    class=" @error('tgl_lahir') border-red-500 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    value="{{ $user->karyawan->tgl_lahir }}">
                @error('tgl_lahir')
                    <span class="text-red-500 text-sm mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400"><b>Jenis Kelamin</b></span>
                <select name="jenis_kelamin" value="{{ $user->karyawan->jenis_kelamin }}"
                    class="@error('jenis_kelamin') border-red-500 @enderror block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <option class="text-gray-600">-- Pilih Jenis Kelamin --</option>
                    <option>Laki - laki</option>
                    <option>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <span class="text-red-500 text-sm mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400"><b>Alamat</b></span>
                <textarea name="alamat" value="{{ $user->karyawan->alamat }}"
                    class="@error('alamat') border-red-500 @enderror block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="3" placeholder="Masukan alamat user"></textarea>
                @error('alamat')
                    <span class="text-red-500 text-sm mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400"><b>Agama</b></span>
                <select name="agama" value="{{ $user->karyawan->agama }}"
                    class="@error('agama') border-red-500 @enderror block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <option class="text-gray-600">-- Pilih Agama --</option>
                    <option>Islam</option>
                    <option>Kristen</option>
                    <option>Buddha</option>
                    <option>Katolik</option>
                </select>
                @error('agama')
                    <span class="text-red-500 text-sm mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <label class="block text-sm mt-2 mb-2">
                <span class="text-gray-700 dark:text-gray-400"><b>Cover</b></span>
                <input name="cover" type="file" value="{{ $user->karyawan->cover }}"
                    class=" @error('cover') border-red-500 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    accept="image/*">
                @error('cover')
                    <span class="text-red-500 text-sm mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <button type="submit"
                class="px-4 py-2 mt-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Save
            </button>
        </form>
    </div>
@endsection
