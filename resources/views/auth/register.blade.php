@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex justify-center">
            <div class="w-full max-w-lg">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-gray-300 p-4 text-center text-xl font-semibold">{{ __('Register') }}</div>

                    <div class="p-6">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Name') }} :
                                </label>
                                <input id="name" type="text"
                                    class="form-input w-full h-8 bg-gray-200 rounded-lg px-2 @error('name') border-red-500 @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <p class="text-red-500 text-xs italic mt-2">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Email Address') }} :
                                </label>
                                <input id="email" type="email"
                                    class="form-input w-full h-8 bg-gray-200 rounded-lg px-2 @error('email') border-red-500 @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <p class="text-red-500 text-xs italic mt-2">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Password') }} :
                                </label>
                                <input id="password" type="password"
                                    class="form-input w-full h-8 bg-gray-200 rounded-lg px-2 @error('password') border-red-500 @enderror"
                                    name="password" required autocomplete="new-password">
                                @error('password')
                                    <p class="text-red-500 text-xs italic mt-2">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Confirm Password') }} :
                                </label>
                                <input id="password-confirm" type="password"
                                    class="form-input w-full h-8 bg-gray-200 rounded-lg px-2" name="password_confirmation"
                                    required autocomplete="new-password">
                            </div>

                            <div class="flex items-center justify-center">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
