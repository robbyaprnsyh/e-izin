<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Izin</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="/icon.jpg">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div id="app">
        <nav class="bg-white shadow">
            <div class="container mx-auto px-24 py-3 flex justify-between items-center">
                <a class="text-xl font-bold text-gray-800" href="{{ url('home') }}">
                    SistemIzin
                </a>
                <button class="md:hidden text-gray-800" type="button" id="navbar-toggle">
                    <span class="material-icons">menu</span>
                </button>

                <div class="hidden md:flex w-full">
                    <ul class="flex space-x-4 ml-auto">
                        @guest
                            @if (Route::has('login'))
                                <li>
                                    <a class="text-gray-700 hover:text-blue-500"
                                        href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li>
                                    <a class="text-gray-700 hover:text-blue-500"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <ul class="flex space-x-4">
                                <li>
                                    <a class="text-gray-700 hover:text-blue-500" href="{{ route('hobi.index') }}">Hobi</a>
                                </li>
                            </ul>

                            <li class="relative">
                                <a class="text-gray-700 hover:text-blue-500" href="#" id="user-menu"
                                    aria-haspopup="true">
                                    <b>
                                        {{ Auth::user()->name }}
                                    </b>
                                </a>
                                <div id="dropdown-menu"
                                    class="hidden absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md z-20">
                                    <a class="text-gray-700 hover:text-blue-500 block px-4 py-2 hover:bg-gray-100"
                                        href="{{ route('profile.index') }}">Profile</a>
                                    <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-red-500"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
    </script>
    <script>
        // Dropdown toggle functionality
        document.getElementById('user-menu').addEventListener('click', function() {
            document.getElementById('dropdown-menu').classList.toggle('hidden');
        });

        // Mobile menu toggle
        document.getElementById('navbar-toggle').addEventListener('click', function() {
            const navbarItems = document.querySelector('.md\\:flex');
            navbarItems.classList.toggle('hidden');
        });
    </script>
</body>


</html>
