@extends('layouts.admin')

@section('title')
    Data Petugas
@endsection

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <div class="flex flex-row justify-between">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Data Admin
                </h2>
                <div class="mb-4 mt-4 flex rounded-xl">
                    <form action="{{ route('petugas.index') }}" method="get" class="flex w-full">
                        @csrf
                        <input id="searchInput" name="search"
                            class="w-full px-4 py-2 border rounded-l-xl focus:outline-none focus:border-purple-400 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                            type="text" placeholder="Cari...">
                        <button type="submit"
                            class="px-6 py-2 bg-purple-600 text-white rounded-r-xl hover:bg-purple-700 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Cari</button>
                    </form>
                </div>
            </div>

            <div class="my-4 mb-6">
                <a href="{{ route('petugas.create') }} "
                    class="px-5 py-3  font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Tambah Petugas
                </a>
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
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">NIK</th>
                                <th class="px-4 py-3">No. Hp</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Role</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($data as $petugas)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm">
                                        {{ $no++ }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $petugas->name }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $petugas->nik }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $petugas->phone }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $petugas->email }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $petugas->roles }}
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
                            @if ($data->onFirstPage())
                                <span
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-not-allowed leading-5 rounded-md">
                                    Previous
                                </span>
                            @else
                                <a href="{{ $data->previousPageUrl() }}"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                    Previous
                                </a>
                            @endif

                            @if ($data->hasMorePages())
                                <a href="{{ $data->nextPageUrl() }}"
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
                                    <span class="font-medium">{{ $data->firstItem() }}</span>
                                    to
                                    <span class="font-medium">{{ $data->lastItem() }}</span>
                                    of
                                    <span class="font-medium">{{ $data->total() }}</span>
                                    results
                                </p>
                            </div>
                            <div class="ml-3 relative">
                                <select
                                    class="form-select border border-gray-300 bg-white text-sm rounded-md focus:outline-none focus:ring focus:border-blue-300"
                                    onchange="window.location.href = this.value;">
                                    @for ($i = 1; $i <= $data->lastPage(); $i++)
                                        <option value="{{ $data->url($i) }}"
                                            {{ $data->currentPage() == $i ? 'selected' : '' }}>
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
