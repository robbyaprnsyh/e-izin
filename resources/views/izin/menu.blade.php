@extends('layouts.admin')
@section('content')
    <div class="mt-4">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Data Izin
        </h4>
    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-4">
        <div class="w-full overflow-x-auto ">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Jabatan</th>
                        <th class="px-4 py-3">Tanggal Mulai</th>
                        <th class="px-4 py-3">Tanggal Selesai</th>
                        <th class="px-4 py-3">Total Izin</th>
                        <th class="px-4 py-3">Alasan</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @if ($izin->isEmpty())
                        <tr>
                            <td colspan="5" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">
                                Data tidak tersedia !
                            </td>
                        </tr>
                    @else
                        @php $no = ($izin->currentPage() - 1) * $izin->perPage() + 1; @endphp
                        @foreach ($izin as $data)
                            <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                                <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
                                    x-transition:enter-start="opacity-0 transform translate-y-1/2"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal"
                                    @keydown.escape="closeModal"
                                    class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                                    role="dialog" id="modal">
                                    <header class="flex justify-between ">
                                        <!-- Modal title -->
                                        <p class="mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-300">
                                            Alasan Izin :
                                        </p>
                                        <button
                                            class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                                            aria-label="close" @click="closeModal">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                <path
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </header>
                                    <!-- Modal body -->
                                    <div class="mb-4">
                                        <!-- Modal description -->
                                        <p class="text-sm text-gray-700 dark:text-gray-400">
                                            {{ $data->alasan }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">{{ $no++ }}</td>
                                <td class="px-4 py-3 text-sm">{{ $data->user->name }}</td>
                                <td class="px-4 py-3 text-sm">{{ $data->karyawan->jabatan->nama_jabatan }}</td>
                                <td class="px-4 py-3 text-sm">{{ $data->tgl_mulai }}</td>
                                <td class="px-4 py-3 text-sm">{{ $data->tgl_selesai }}</td>
                                <td class="px-4 py-3 text-sm">{{ $data->total_hari_izin }} hari</td>
                                <td class="px-4 py-3">
                                    <button @click="openModal"
                                        class="px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                            <path
                                                d="M12 9a3.02 3.02 0 0 0-3 3c0 1.642 1.358 3 3 3 1.641 0 3-1.358 3-3 0-1.641-1.359-3-3-3z">
                                            </path>
                                            <path
                                                d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 12c-5.351 0-7.424-3.846-7.926-5C4.578 10.842 6.652 7 12 7c5.351 0 7.424 3.846 7.926 5-.504 1.158-2.578 5-7.926 5z">
                                            </path>
                                        </svg>
                                    </button>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    @if ($data->status == 'Diterima')
                                        <button type="button"
                                            class="bg-green-100 text-green-700 font-medium py-2 px-4 rounded-full cursor-not-allowed opacity-50">
                                            -- Diterima --
                                        </button>
                                    @elseif ($data->status == 'Ditolak')
                                        <button type="button"
                                            class="bg-red-100 text-red-700 font-medium py-2 px-4 rounded-full cursor-not-allowed opacity-50">
                                            -- Ditolak --
                                        </button>
                                    @else
                                        <div class="flex">
                                            <form action="{{ route('izin.reject', $data->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('PUT')
                                                <button
                                                    class="flex bg-red-100 mr-2 hover:bg-red-600 text-red-700 font-medium py-2 px-4 rounded-full mx-1"
                                                    type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z">
                                                        </path>
                                                    </svg>
                                                    Tolak
                                                </button>
                                            </form>
                                            <form action="{{ route('izin.approve', $data->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('PUT')
                                                <button
                                                    class="flex bg-green-100 hover:bg-green-600 text-green-700 font-medium py-2 px-4 rounded-full mx-1"
                                                    type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z">
                                                        </path>
                                                    </svg>
                                                    Terima
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <span class="flex items-center col-span-3">
                Showing {{ $izin->firstItem() }}-{{ $izin->lastItem() }} of {{ $izin->total() }}
            </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                        <!-- Previous Page Link -->
                        @if ($izin->onFirstPage())
                            <li>
                                <button class="px-3 py-1 rounded-md rounded-l-lg text-gray-400" aria-disabled="true">
                                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                        <path
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </li>
                        @else
                            <li>
                                <a href="{{ $izin->previousPageUrl() }}"
                                    class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                    aria-label="Previous">
                                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                        <path
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </li>
                        @endif

                        <!-- Pagination Links -->
                        @foreach ($izin->getUrlRange(1, $izin->lastPage()) as $page => $url)
                            @if ($page == $izin->currentPage())
                                <li>
                                    <button
                                        class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                                        {{ $page }}
                                    </button>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}"
                                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endif
                        @endforeach

                        <!-- Next Page Link -->
                        @if ($izin->hasMorePages())
                            <li>
                                <a href="{{ $izin->nextPageUrl() }}"
                                    class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                    aria-label="Next">
                                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                        <path
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </li>
                        @else
                            <li>
                                <button class="px-3 py-1 rounded-md rounded-r-lg text-gray-400" aria-disabled="true">
                                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                        <path
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </li>
                        @endif
                    </ul>
                </nav>
            </span>
        </div>
    </div>
@endsection
