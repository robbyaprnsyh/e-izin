@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-gray-300 p-4 text-center text-xl font-semibold">{{ __('Edit Password') }}</div>

                    @if (session('success'))
                        <div class="bg-green-600 text-white p-3 rounded mt-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="p-6">
                        <form action="{{ route('password.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="current_password" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Password Lama') }}:
                                </label>
                                <input type="password" name="current_password" id="current_password"
                                    class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('current_password') border-red-500 @enderror"
                                    required>
                                @error('current_password')
                                    <p class="text-red-500 text-xs italic mt-2">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="new_password" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Password Baru') }}:
                                </label>
                                <input type="password" name="new_password" id="new_password"
                                    class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('new_password') border-red-500 @enderror"
                                    required>
                                @error('new_password')
                                    <p class="text-red-500 text-xs italic mt-2">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="new_password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Konfirmasi Password Baru') }}:
                                </label>
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                    class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('new_password_confirmation') border-red-500 @enderror"
                                    required>
                                @error('new_password_confirmation')
                                    <p class="text-red-500 text-xs italic mt-2">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>

                            <div class="flex justify-end">
                                @if (Route::has('password.request'))
                                    <a class="text-sm hover:underline hover:text-red-500"
                                        href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                            <div class="flex items-center justify-center mt-4">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
