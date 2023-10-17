@extends('layouts.masyarakat')
@section('css')
    <style>
        .image-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
    </style>
@endsection
@section('title')
    Detail Laporan
@endsection

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <div class="flex flex-row my-6">
                <a href="{{ url('user/pengaduan') }}" class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#9e9b9b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 8l-4 4 4 4M16 12H9" />
                    </svg>
                </a>
                <h2
                    class="text-2xl font-semibold text-center text-gray-700 dark:text-gray-200 flex-grow justify-center items-center">
                    Detail Pengaduan
                </h2>
            </div>

            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    @foreach ($item->details as $i)
                        <table
                            class="w-full text-gray-800 text-sm font-semibold px-4 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400 hover:bg-gray-200 p-3">
                            <tbody>
                                <tr class="py-10 border-gray-200 hover:bg-gray-100 hover:text-black">
                                    <td>Nama </td>
                                    <td> : </td>
                                    <td>{{ $i->name }}</td>
                                </tr>
                                <tr class="py-10 border-gray-200 hover:bg-gray-100 hover:text-black">
                                    <td>NIK </td>
                                    <td> : </td>
                                    <td>{{ $i->user_nik }}</td>
                                </tr>
                                <tr class="py-10 border-gray-200 hover:bg-gray-100 hover:text-black">
                                    <td>No. Telepone </td>
                                    <td> : </td>
                                    <td>{{ $i->user->phone }}</td>
                                </tr>
                                <tr class="py-10 border-gray-200 hover:bg-gray-100 hover:text-black">
                                    <td>Tanggal </td>
                                    <td> : </td>
                                    <td>{{ $i->created_at->format('l, d F Y - H:i:s') }}</td>
                                </tr>
                                <tr class="py-10 border-gray-200 hover:bg-gray-100 hover:text-black">
                                    <td>Status </td>
                                    <td> : </td>
                                    <td>
                                        @if ($item->status == 'Belum di Proses')
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700">
                                                {{ $item->status }}
                                            </span>
                                        @elseif ($item->status == 'Sedang di Proses')
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600">
                                                {{ $item->status }}
                                            </span>
                                        @else
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100">
                                                {{ $item->status }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="py-10 border-gray-200 hover:bg-gray-100 hover:text-black">
                                    <td>Deskripsi </td>
                                    <td> : </td>
                                    <td>
                                        {{ $i->description }}
                                    </td>
                                </tr>
                                {{-- <tr class="py-10 border-gray-200 hover:bg-gray-100 hover:text-black">
                                    <td>Bukti </td>
                                    <td> : </td>
                                    <td>
                                        <img style="max-width: 50%; height:auto"
                                            src="{{ asset('file/laporan') }}/image/{{ $item->image }}" alt=""
                                            loading="lazy" />
                                    </td>
                                </tr> --}}

                            </tbody>
                        </table>
                        <div class="px-4 py-3 mb-2 flex bg-white rounded-lg shadow-md dark:text-gray-400 dark:bg-gray-800">
                            <div class="text-center items-center justify-center flex-1 image-container">
                                <h1 class="mb-8 font-semibold">Bukti</h1>
                                <img style="max-width: 50%; height:auto"
                                    src="{{ asset('file/laporan') }}/image/{{ $item->image }}" alt=""
                                    loading="lazy" />
                            </div>
                        </div>
                    @endforeach
                    <div class="px-4 py-3 mb-2 flex bg-white rounded-lg shadow-md dark:text-gray-400   dark:bg-gray-800">

                        <div class="text-center flex-1">
                            <h1 class="mb-8 font-semibold">Tanggapan</h1>
                            <div class="text-gray-800 dark:text-gray-400">
                                @if (empty($tangap))
                                    Belum ada tanggapan
                                @else
                                    @foreach ($tangap as $t)
                                        <div class="flex justify-end mb-4">
                                            <div class="bg-blue-500 text-white px-4 py-2 rounded-lg max-w-sm relative">
                                                <div class="mb-2">{{ $t->tanggapan }}</div>
                                                @unless (empty($t->image))
                                                    <div class="mb-2">
                                                        <img class="max-w-1/2 mx-auto h-auto"
                                                            src="{{ asset('file/tanggapan') }}/{{ $t->image }}"
                                                            alt="" loading="lazy" />
                                                    </div>
                                                @endunless
                                                <div class="text-xs text-gray-600 mb-1">
                                                    {{ \Carbon\Carbon::parse($t->created_at)->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </main>
@endsection
