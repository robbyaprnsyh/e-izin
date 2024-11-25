@extends('layouts.admin')
@section('content')
    <div class="mt-4">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Create User
        </h4>
    </div>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400"><b>Nama User</b></span>
                <input name="name" type="text" value="{{ old('name') }}"
                    class=" @error('name') border-red-500 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Masukan nama user">
                @error('name')
                    <span class="text-red-500 text-sm mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400"><b>Email</b></span>
                <input name="email" type="email" value="{{ old('email') }}"
                    class=" @error('email') border-red-500 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Masukan email user">
                @error('email')
                    <span class="text-red-500 text-sm mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400"><b>Password</b></span>
                <input name="password" type="password" value="{{ old('password') }}"
                    class=" @error('password') border-red-500 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Masukan password user">
                @error('password')
                    <span class="text-red-500 text-sm mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400"><b>NIK</b></span>
                <input name="nik" type="number" value="{{ old('nik') }}"
                    class=" @error('nik') border-red-500 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Masukan nik user">
                @error('nik')
                    <span class="text-red-500 text-sm mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400"><b>No Telepon</b></span>
                <input name="no_telp" type="text" value="{{ old('no_telp') }}"
                    class=" @error('no_telp') border-red-500 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Masukan telepon user">
                @error('no_telp')
                    <span class="text-red-500 text-sm mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400"><b>Tanggal Lahir</b></span>
                <input name="tgl_lahir" type="date" value="{{ old('tgl_lahir') }}"
                    class=" @error('tgl_lahir') border-red-500 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                @error('tgl_lahir')
                    <span class="text-red-500 text-sm mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400"><b>Jenis Kelamin</b></span>
                <select name="jenis_kelamin" value="{{ old('jenis_kelamin') }}"
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
                <textarea name="alamat" value="{{ old('alamat') }}"
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
                <select name="agama" value="{{ old('agama') }}"
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
                <input name="cover" type="file" value="{{ old('cover') }}"
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
