@extends('layouts.admin')

@section('title')
    Data Petugas
@endsection

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Data Petugas
            </h2>

            <div class="flex flex-col items-center sm:flex-row justify-between mb-8">
                @include('pages.admin.petugas.addModal')
                <div class="mt-4 sm:mt-0 sm:flex rounded-xl">
                    <form action="{{ route('petugas.index') }}" method="get" class="w-full flex">
                        @csrf
                        <div class="relative flex-1 mr-2">
                            <input
                                class="border-2 border-gray-300 bg-white h-10 px-5 pr-10 rounded-lg text-sm focus:outline-none w-full"
                                type="search" name="search" placeholder="Search">
                            <button type="submit" class="absolute right-0 top-0 mt-2 mr-2 sm:mt-0 sm:mr-0">
                                <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                    viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                                    xml:space="preserve" width="512px" height="512px">
                                    <path
                                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                </svg>
                            </button>
                        </div>
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
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">NIK</th>
                                <th class="px-4 py-3">No. Hp</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Role</th>
                                <th class="px-4 py-3">Aksi</th>
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
                                    <td class="px-4 py-3 text-sm">
                                        <div class="flex items-center space-x-4 text-sm">
                                            @include('pages.admin.petugas.editModal')
                                            @include('pages.admin.petugas.deleteModal')
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
                        <div class="sm:flex-1 sm:flex sm:items-center sm:justify-center">
                            <div>
                                <p class="text-sm text-gray-700 dark:text-gray-200">
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

@section('js')
    <script>
        function togglePasswordVisibility(inputId) {
            const passwordInput = document.getElementById(inputId);
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
@endsection
