@extends('layouts.admin')

@section('title')
    Data Pengaduan
@endsection

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <div class="flex flex-row justify-between">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Pengaduan
                </h2>
                <div class="mb-4 mt-4 flex rounded-xl">
                    <form action="{{ route('masyarakat') }}" method="get" class="flex w-full">
                        @csrf
                        <input id="searchInput" name="search"
                            class="w-full px-4 py-2 border rounded-l-xl focus:outline-none focus:border-purple-400 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                            type="text" placeholder="Cari...">
                        <button type="submit"
                            class="px-6 py-2 bg-purple-600 text-white rounded-r-xl hover:bg-purple-700 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Cari</button>
                    </form>
                </div>
            </div>

            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">No.</th>
                                <th class="px-4 py-3">Foto</th>
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($items as $item)
                                <tr class="text-gray-700 dark:text-gray-400 ">
                                    <td class="px-4 py-3 text-sm">
                                        {{ $no++ }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <img style="max-width: 50%; height:auto"
                                                src="{{ asset('file/laporan') }}/image/{{ $item->image }}" alt=""
                                                loading="lazy" />
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->name }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->created_at->format('l, d F Y - H:i:s') }}
                                    </td>
                                    @if ($item->status == 'Belum di Proses')
                                        <td class="px-4 py-3 text-xs">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                    @elseif ($item->status == 'Sedang di Proses')
                                        <td class="px-4 py-3 text-xs">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                    @else
                                        <td class="px-4 py-3 text-xs">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                    @endif

                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-4 text-sm">

                                            <a href="{{ route('pengaduans.show', $item->id) }} "
                                                class="flex items-center justify-between  text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Detail">

                                                <svg class="w-5 h-5" aria-hidden="true" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('pengaduans.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button
                                                    class="flex items-center justify-between  text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Delete">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-gray-400">
                                        Data Kosong
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4 flex items-center justify-between">
                        <div class="flex-1 flex justify-between sm:hidden">
                            @if ($items->onFirstPage())
                                <span
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-not-allowed leading-5 rounded-md">
                                    Previous
                                </span>
                            @else
                                <a href="{{ $items->previousPageUrl() }}"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                    Previous
                                </a>
                            @endif

                            @if ($items->hasMorePages())
                                <a href="{{ $items->nextPageUrl() }}"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                    Next
                                </a>
                            @else
                                <span
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-not-allowed leading-5 rounded-md">
                                    Next
                                </span>
                            @endif
                        </div>

                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-center">
                            <div>
                                <p class="text-sm text-gray-700">
                                    Showing
                                    <span class="font-medium">{{ $items->firstItem() }}</span>
                                    to
                                    <span class="font-medium">{{ $items->lastItem() }}</span>
                                    of
                                    <span class="font-medium">{{ $items->total() }}</span>
                                    results
                                </p>
                            </div>
                            <div class="ml-3 relative">
                                <select
                                    class="form-select border border-gray-300 bg-white text-sm rounded-md focus:outline-none focus:ring focus:border-blue-300"
                                    onchange="window.location.href = this.value;">
                                    @for ($i = 1; $i <= $items->lastPage(); $i++)
                                        <option value="{{ $items->url($i) }}"
                                            {{ $items->currentPage() == $i ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
@endsection
