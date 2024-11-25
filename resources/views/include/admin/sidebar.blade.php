<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            E-Izin
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                @if (Request::is('home'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                    {{ Request::is('home') ? 'text-black' : '' }} href="{{ route('home') }}">
                    <svg class="w-5 h-5 {{ Request::is('home') ? 'text-black' : '' }}" aria-hidden="true" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4 {{ Request::is('home') ? 'text-black' : '' }}">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3">
                @if (Request::is('user'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                    {{ Request::is('user') ? 'text-black' : '' }} href="{{ route('user.index') }}">
                    <svg class="w-5 h-5 {{ Request::is('user') ? 'text-black' : '' }}" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>

                    <span class="ml-4 {{ Request::is('user') ? 'text-black' : '' }}">User</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3">
                @if (Request::is('jabatan'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    {{ Request::is('jabatan') ? 'text-black' : '' }} href="{{ route('jabatan.index') }}">
                    <svg class="w-5 h-5 {{ Request::is('jabatan') ? 'text-black' : '' }}" aria-hidden="true"
                        fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4 {{ Request::is('jabatan') ? 'text-black' : '' }}">Jabatan</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3">
                @if (Request::is('izin/menu'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    {{ Request::is('izin/menu') ? 'text-black' : '' }} href="{{ route('izin.menu') }}">
                    <svg class="w-5 h-5 {{ Request::is('izin/menu') ? 'text-black' : '' }}" aria-hidden="true"
                        fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        viewBox="0 0 24 24" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 0.358);transform: ;msFilter:;">
                        <path
                            d="M20.29 8.29 16 12.58l-1.3-1.29-1.41 1.42 2.7 2.7 5.72-5.7zM4 8a3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4 3.91 3.91 0 0 0-4 4zm6 0a1.91 1.91 0 0 1-2 2 1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2zM4 18a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h2v-1a5 5 0 0 0-5-5H7a5 5 0 0 0-5 5v1h2z">
                        </path>
                    </svg>
                    <span class="ml-4 mr-4 {{ Request::is('izin/menu') ? 'text-black' : '' }}">Approve Izin</span>
                    @if (isset($izinNotifications) && $izinNotifications->count() > 0)
                        <span id="notification-count" class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                            {{ $izinNotifications->count() }}
                            {{-- 1 --}}
                        </span>
                    @endif
                </a>
            </li>
        </ul>
    </div>
</aside>
