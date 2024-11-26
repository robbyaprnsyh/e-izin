@extends('layouts.user')
@section('content')
    <div class="mt-4">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Ajukan Izin
        </h4>
    </div>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('izin.store') }}" method="POST">
            @csrf
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400"><b>Tanggal Mulai</b></span>
                <input name="tgl_mulai" type="date" value="{{ old('tgl_mulai') }}"
                    class=" @error('tgl_mulai') border-red-500 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                @error('tgl_mulai')
                    <span class="text-red-500 text-sm mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400"><b>Tanggal Selesai</b></span>
                <input name="tgl_selesai" type="date" value="{{ old('tgl_selesai') }}"
                    class=" @error('tgl_selesai') border-red-500 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                @error('tgl_selesai')
                    <span class="text-red-500 text-sm mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400"><b>Alasan</b></span>
                <textarea name="alasan" value="{{ old('alasan') }}"
                    class="@error('alasan') border-red-500 @enderror block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="3" placeholder="Masukan alasan izin"></textarea>
                @error('alasan')
                    <span class="text-red-500 text-sm mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <button type="submit"
                class="px-4 py-2 mt-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Ajukan
            </button>
        </form>
    </div>
@endsection
