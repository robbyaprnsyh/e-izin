@extends('layouts.admin')
@section('content')
    <div class="mt-4">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Create Jabatan
        </h4>
    </div>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('jabatan.store') }}" method="POST">
            @csrf
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama Jabatan</span>
                <input name="nama_jabatan"
                    class=" @error('nama_jabatan') border-red-500 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Masukan nama jabatan" />
                @error('nama_jabatan')
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
