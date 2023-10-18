<!DOCTYPE html>
<html lang="en">
{{-- //DONE mode mobile masih bisa digeser kanan kiri --}}

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description"
        content="Pengaduan dari nasabah Bank Arthaya. Laporkan masalah atau pengalaman Anda dengan layanan kami." />
    <meta name="keywords" content="pengaduan, bank arthaya, nasabah, layanan pelanggan" />
    <meta name="author" content="IT Programmer Bank Arthaya" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ARTHAYA SUPPORT</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" defer>
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}">
    <style>
        html {
            scroll-behavior: smooth;
        }

        #menu {
            border-radius: 10px;
            background-color: white;
            margin: 1%;
            padding: 0.5%;
            border-radius: 10px;
            font-weight: bold;
        }

        #menu a:hover {
            background-color: #f0f0f0;
        }

        /* styles.css */
        .basis {
            width: 50%;
            /* Setengah lebar pada mobile */
        }

        /* Tablet Layout */
        @media (max-width: 767px) {
            .basis {
                width: 100%;
                /* Penuh lebar pada mobile */
            }
        }

        /* Responsive Image */
        .img-responsive {
            width: 100%;
            height: auto;
            max-width: 30%;
        }
    </style>

</head>


<body class="overflow-x-hidden">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-around lg:justify-between mx-auto p-4">
            <a href="https://pengaduan.bankarthaya.com/" class="flex items-center">
                <img src="{{ asset('assets/img/favicon.png') }}" class="h-8 mr-3" alt="Flowbite Logo" />
                <div class="flex flex-col">
                    <span class="self-start text-2xl font-semibold whitespace-nowrap dark:text-white">Arthaya
                        Support</span>
                    <span class="self-start text-xs font-semibold whitespace-nowrap dark:text-white text-gray-400">
                        PT. BPR Arthaya Indotama
                        Pusaka</span>
                </div>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{ url('/') }}"
                            class="block py-2 pl-3 pr-4 mt-2 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#how"
                            class="block py-2 pl-3 pr-4 mt-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Tata
                            Cara</a>
                    </li>
                    <li>
                        @if (Route::has('login'))
                            @auth
                                <button
                                    class="block py-2 pl-3 pr-4 mt-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent focus:outline-none">
                                    <a href="{{ url('dashboard') }}" style="font-weight: bold;">Dashboard</a>
                                </button>
                            @else
                                <button
                                    class="block py-2 pl-3 pr-4 mt-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent focus:outline-none">
                                    <a href="{{ url('login') }}" style="font-weight: bold;">Masuk</a>
                                </button>
                            @endauth
                        @endif

                    </li>
                    <li>
                        <button class="block py-2 px-3 text-white bg-blue-700 rounded-full">
                            <a href="{{ url('register') }}" style="font-weight: bold;">Daftar</a>
                        </button>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="pt-10 px-16 bg-purple-200 h-screen">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <!--Left Col-->
            <div
                class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left text-gray-800">
                <h1 class="my-4 text-4xl font-bold leading-tight text-center md:text-left">
                    Layanan Pengaduan Nasabah Online BANK ARTHAYA
                </h1>
                <p class="leading-normal text-1xl mb-8 text-center md:text-left">
                    Sampaikan laporan masalah Anda di sini, kami akan memprosesnya dengan cepat.
                </p>
                <button
                    class="mx-auto lg:mx-0 bg-blue-500 text-white font-bold rounded-md my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    <a href="{{ url('login') }}">Laporkan!</a>
                </button>
            </div>

            <!--Right Col-->
            <div class="w-full md:w-2/5 justify-center items-start text-center md:text-left text-gray-800  md:block">
                <img class="object-fill mx-auto sm:mx-36" src="{{ asset('img/melayani.webp') }}" alt="Melayani" />
            </div>
        </div>
    </div>

    <div id="how" class="container my-20 mx-auto px-4 md:px-12">
        <div class="flex flex-col lg:flex-row -mx-1 lg:-mx-4">
            <div class="my-1 px-1 basis w-1/2 lg:w-1/4 sm:w-full">
                <!-- Article 1 -->
                <article class="overflow-hidden rounded-lg shadow-lg text-gray-800">
                    <img alt="Tulis"
                        class="block h-auto img-responsive mx-auto my-10 transform transition hover:scale-125 duration-300 ease-in-out"
                        src="img/tulis.svg" />
                    <header class="leading-tight p-2 md:p-4 text-center">
                        <h1 class="text-lg font-bold">1. Tulis Laporan</h1>
                        <p class="text-grey-darker text-sm py-4">
                            Tulis laporan keluhan Anda dengan jelas.
                        </p>
                    </header>
                </article>
            </div>

            <div class="my-1 px-1 basis w-1/2 lg:w-1/4 sm:w-full">
                <!-- Article 2 -->
                <article class="overflow-hidden rounded-lg shadow-lg text-gray-800">
                    <img alt="Proses"
                        class="block h-auto img-responsive mx-auto my-10 transform transition hover:scale-125 duration-300 ease-in-out"
                        src="img/processing.svg" />
                    <header class="leading-tight p-2 md:p-4 text-center">
                        <h1 class="text-lg font-bold">2. Proses Verifikasi</h1>
                        <p class="text-grey-darker text-sm py-4">
                            Tunggu sampai laporan Anda di verifikasi.
                        </p>
                    </header>
                </article>
            </div>

            <div class="my-1 px-1 basis w-1/2 lg:w-1/4 sm:w-full">
                <!-- Article 3 -->
                <article class="overflow-hidden rounded-lg shadow-lg text-gray-800">
                    <img alt="Ditindak"
                        class="block h-auto img-responsive mx-auto my-10 transform transition hover:scale-125 duration-300 ease-in-out"
                        src="img/act.svg" />
                    <header class="leading-tight p-2 md:p-4 text-center">
                        <h1 class="text-lg font-bold">3. Tindak Lanjut</h1>
                        <p class="text-grey-darker text-sm py-4">
                            Laporan Anda sedang dalam tindak lanjut.
                        </p>
                    </header>
                </article>
            </div>

            <div class="my-1 px-1 basis w-1/2 lg:w-1/4 sm:w-full">
                <!-- Article 4 -->
                <article class="overflow-hidden rounded-lg shadow-lg text-gray-800">
                    <img alt="Selesai"
                        class="block h-auto img-responsive mx-auto my-10 transform transition hover:scale-125 duration-300 ease-in-out"
                        src="img/verification.svg" />
                    <header class="leading-tight p-2 md:p-4 text-center">
                        <h1 class="text-lg font-bold">4. Selesai</h1>
                        <p class="text-grey-darker text-sm py-4">
                            Laporan pengaduan telah selesai ditindak.
                        </p>
                    </header>
                </article>
            </div>
        </div>
    </div>
    <div class="py-10 px-4 bg-purple-200 md:px-16 text-center">
        <h1
            class="mb-4 text-xl text-center font-bold leading-none tracking-tight text-gray-700 md:text-3xl lg:text-4xl dark:text-white sm:mx-3">
            JARINGAN BANK TERHUBUNG
        </h1>
        <div class="flex flex-col lg:flex-row text-center justify-between mb-3">
            <div class="flex-1 ml-4 mb-4 md:mb-0">
                <div class="flex flex-col items-center mb-3">
                    <h4 class="font-bold text-5xl mb-0">
                        <span x-data="animatedCounter(1, 100, 0)" x-init="updatecounter" x-text="Math.round(current)"></span>
                    </h4>
                    <p class="text-muted text-truncate mt-2 text-sm">Kantor Pusat</p>
                </div>
            </div>
            <div class="flex-1 ml-4 mb-4 md:mb-0">
                <div class="flex flex-col items-center mb-3">
                    <h4 class="font-bold text-5xl mb-0">
                        <span x-data="animatedCounter(2, 100, 0)" x-init="updatecounter" x-text="Math.round(current)"></span>
                    </h4>
                    <p class="text-muted text-truncate mt-2 text-sm">Kantor Cabang</p>
                </div>
            </div>
            <div class="flex-1 ml-4">
                <div class="flex flex-col items-center mb-3">
                    <h4 class="font-bold text-5xl mb-0">
                        <span x-data="animatedCounter(7, 100, 0)" x-init="updatecounter" x-text="Math.round(current)"></span>
                    </h4>
                    <p class="text-muted text-truncate mt-2 text-sm">Kantor Kas</p>
                </div>
            </div>
        </div>
        <a href="https://bankarthaya.com/jaringan-kantorr/" target="_blank">
            <button
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Lihat Selengkapnya
            </button>
        </a>
    </div>


    <footer>
        <div class="mx-auto w-full space-y-8 px-4 py-16 sm:px-6 lg:space-y-16 lg:px-8">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                <div>
                    <div class="text-teal-600">
                        <img src="{{ asset('assets/img/favicon.png') }}" alt="logo pengaduan"
                            style="max-width: 30%; height: auto;">
                    </div>

                    <p class="mt-4 max-w-xs text-gray-500 font-bold text-2xl">
                        Arthaya Support
                    </p>

                    <p class="mt-1 max-w-xs text-gray-500 font-bold text-xs">
                        by PT. BPR ARTHAYA INDOTAMA PUSAKA
                    </p>

                    <ul class="mt-8 flex gap-6">
                        <li>
                            <a href="https://www.facebook.com/arthatama.arthatama.7" rel="noreferrer" target="_blank"
                                class="text-gray-700 transition hover:opacity-75">
                                <span class="sr-only">Facebook</span>

                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/bankarthaya/" rel="noreferrer" target="_blank"
                                class="text-gray-700 transition hover:opacity-75">
                                <span class="sr-only">Instagram</span>

                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M12 0c6.6274 0 12 5.3726 12 12s-5.3726 12-12 12S0 18.6274 0 12 5.3726 0 12 0zm3.115 4.5h-6.23c-2.5536 0-4.281 1.6524-4.3805 4.1552L4.5 8.8851v6.1996c0 1.3004.4234 2.4193 1.2702 3.2359.7582.73 1.751 1.1212 2.8818 1.1734l.2633.006h6.1694c1.3004 0 2.389-.4234 3.1754-1.1794.762-.734 1.1817-1.7576 1.2343-2.948l.0056-.2577V8.8851c0-1.2702-.4234-2.3589-1.2097-3.1452-.7338-.762-1.7575-1.1817-2.9234-1.2343l-.252-.0056zM8.9152 5.8911h6.2299c.9072 0 1.6633.2722 2.2076.8166.4713.499.7647 1.1758.8103 1.9607l.0063.2167v6.2298c0 .9375-.3327 1.6936-.877 2.2077-.499.4713-1.176.7392-1.984.7806l-.2237.0057H8.9153c-.9072 0-1.6633-.2722-2.2076-.7863-.499-.499-.7693-1.1759-.8109-2.0073l-.0057-.2306V8.885c0-.9073.2722-1.6633.8166-2.2077.4712-.4713 1.1712-.7392 1.9834-.7806l.2242-.0057h6.2299-6.2299zM12 8.0988c-2.117 0-3.871 1.7238-3.871 3.871A3.8591 3.8591 0 0 0 12 15.8408c2.1472 0 3.871-1.7541 3.871-3.871 0-2.117-1.754-3.871-3.871-3.871zm0 1.3911c1.3609 0 2.4798 1.119 2.4798 2.4799 0 1.3608-1.119 2.4798-2.4798 2.4798-1.3609 0-2.4798-1.119-2.4798-2.4798 0-1.361 1.119-2.4799 2.4798-2.4799zm4.0222-2.3589a.877.877 0 1 0 0 1.754.877.877 0 0 0 0-1.754z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://wa.me/628113666519" rel="noreferrer" target="_blank"
                                class="text-gray-700 transition hover:opacity-75">
                                <span class="sr-only">WhatsApp</span>

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 0a12 12 0 1 1 0 24 12 12 0 0 1 0-24zm.14 4.5a7.34 7.34 0 0 0-6.46 10.82l.15.26L4.5 19.5l4.08-1.3a7.38 7.38 0 0 0 10.92-6.4c0-4.03-3.3-7.3-7.36-7.3zm0 1.16c3.41 0 6.19 2.76 6.19 6.15a6.17 6.17 0 0 1-9.37 5.27l-.23-.15-2.38.76.77-2.28a6.08 6.08 0 0 1-1.17-3.6 6.17 6.17 0 0 1 6.19-6.15zM9.66 8.47a.67.67 0 0 0-.48.23l-.14.15c-.2.23-.5.65-.5 1.34 0 .72.43 1.41.64 1.71l.14.2a7.26 7.26 0 0 0 3.04 2.65l.4.14c1.44.54 1.47.33 1.77.3.33-.03 1.07-.43 1.22-.85.15-.42.15-.78.1-.85-.02-.05-.08-.08-.15-.12l-1.12-.54a5.15 5.15 0 0 0-.3-.13c-.17-.06-.3-.1-.41.09-.12.18-.47.58-.57.7-.1.1-.18.13-.32.08l-.4-.18a4.64 4.64 0 0 1-2.13-1.98c-.1-.18-.01-.28.08-.37l.27-.31c.1-.1.12-.18.18-.3a.3.3 0 0 0 .01-.26l-.1-.23-.48-1.15c-.15-.36-.3-.3-.4-.3l-.35-.02z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="tel:(+62)8113666519" rel="noreferrer" target="_blank"
                                class="text-gray-700 transition hover:opacity-75">
                                <span class="sr-only">Telephone</span>

                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.bankarthaya.com" rel="noreferrer" target="_blank"
                                class="text-gray-700 transition hover:opacity-75">
                                <span class="sr-only">Website</span>

                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm0 4a8.037 8.037 0 0 0-3.114.629 8.019 8.019 0 0 0-4.724 5.76 8.042 8.042 0 0 0 .467 4.725 7.99 7.99 0 0 0 1.714 2.543 7.993 7.993 0 0 0 11.314 0A7.968 7.968 0 0 0 20 12a7.995 7.995 0 0 0-.629-3.114 7.96 7.96 0 0 0-1.714-2.542 8.005 8.005 0 0 0-4.046-2.18A8.03 8.03 0 0 0 12.001 4zm1.163 9.118l.045-.015.212.57a28.14 28.14 0 0 1 1.248 4.618 6.798 6.798 0 0 1-2.668.541c-1.55 0-2.98-.516-4.126-1.387l-.073-.06.036-.07c.232-.448 1.651-2.917 5.326-4.197zm5.583-.033a6.837 6.837 0 0 1-2.928 4.582l-.092-.499a30.737 30.737 0 0 0-1.238-4.381c2.206-.353 4.117.252 4.258.298zm-6.558-2.275c.196.383.383.773.554 1.162l-.269.081c-2.992.967-4.787 3.334-5.358 4.192l-.2.317-.184-.214A6.806 6.806 0 0 1 5.168 12c0-.073.003-.144.006-.216l.378.001c.99-.009 3.766-.116 6.636-.975zm5.089-3.15a6.798 6.798 0 0 1 1.553 4.272l-.428-.081c-.789-.135-2.55-.367-4.33-.143l-.148-.353a20.456 20.456 0 0 0-.454-.99c2.698-1.102 3.794-2.686 3.807-2.705zM9.085 5.82l.49.685c.493.71 1.287 1.901 2.047 3.252-3.28.872-6.127.838-6.308.834a6.842 6.842 0 0 1 3.771-4.77zM12 5.169c1.73 0 3.309.645 4.513 1.704l-.091.126c-.295.38-1.329 1.543-3.478 2.348l-.252-.452A34.757 34.757 0 0 0 10.39 5.36 6.822 6.822 0 0 1 12 5.168z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:col-span-2 lg:grid-cols-3">
                    <div>
                        <p class="font-medium text-gray-900">Produk & Jasa</p>

                        <ul class="mt-6 space-y-4 text-sm">
                            <li>
                                <a href="https://bankarthaya.com/tabunganku/" target="_blank"
                                    class="text-gray-700 transition hover:opacity-75">
                                    TabunganKU
                                </a>
                            </li>
                            <li>
                                <a href="https://bankarthaya.com/deposito/" target="_blank"
                                    class="text-gray-700 transition hover:opacity-75">
                                    Deposito
                                </a>
                            </li>
                            <li>
                                <a href="https://bankarthaya.com/kredit/" target="_blank"
                                    class="text-gray-700 transition hover:opacity-75">
                                    Kredit
                                </a>
                            </li>
                            <li>
                                <a href="https://bankarthaya.com/tabungan-seraya/" target="_blank"
                                    class="text-gray-700 transition hover:opacity-75">
                                    Tabungan SERAYA
                                </a>
                            </li>
                            <li>
                                <a href="https://bankarthaya.com/tabungan-muamalah/" target="_blank"
                                    class="text-gray-700 transition hover:opacity-75">
                                    Tabungan MUAMALAH
                                </a>
                            </li>
                            <li>
                                <a href="https://bankarthaya.com/simpanan-pelajar/" target="_blank"
                                    class="text-gray-700 transition hover:opacity-75">
                                    Tabungan SIMPEL
                                </a>
                            </li>
                            <li>
                                <a href="https://bankarthaya.com/tabungan-mapan/" target="_blank"
                                    class="text-gray-700 transition hover:opacity-75">
                                    Tabungan MAPAN
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div>
                        <p class="font-medium text-gray-900">Perusahaan</p>

                        <ul class="mt-6 space-y-4 text-sm">
                            <li>
                                <a href="https://bankarthaya.com/sejarah/"
                                    class="text-gray-700 transition hover:opacity-75" target="_blank">
                                    Tentang
                                </a>
                            </li>

                            <li>
                                <a href="https://bankarthaya.com/struktur-organisasi/"
                                    class="text-gray-700 transition hover:opacity-75" target="_blank">
                                    Struktur
                                </a>
                            </li>

                            <li>
                                <a href="https://bankarthaya.com/jaringan-kantorr/"
                                    class="text-gray-700 transition hover:opacity-75" target="_blank">
                                    Jaringan Kantor
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <p class="font-medium text-gray-900">Tautan lain</p>

                        <ul class="mt-6 space-y-4 text-sm">
                            <li>
                                <a href="https://pengaduan.bankarthaya.com/"
                                    class="text-gray-700 transition hover:opacity-75" target="_blank">
                                    Pengaduan Nasabah
                                </a>
                            </li>

                            <li>
                                <a href="https://bankarthaya.com/saran/"
                                    class="text-gray-700 transition hover:opacity-75" target="_blank">
                                    Kritik dan Saran
                                </a>
                            </li>

                            <li>
                                <a href="https://recruitment.maesagroup.co.id"
                                    class="text-gray-700 transition hover:opacity-75" target="_blank">
                                    Karir
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <p class="text-xs text-gray-500">
                &copy; <span id="currentYear"></span>. PT BPR ARTHAYA INDOTAMA PUSAKA. <br>All rights reserved.
            </p>
        </div>
    </footer>

    @include('sweetalert::alert')
    <script>
        const currentYear = new Date().getFullYear();
        document.getElementById('currentYear').textContent = currentYear;
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('[data-collapse-toggle="navbar-default"]');
            const menu = document.getElementById('navbar-default');

            menuToggle.addEventListener('click', function() {
                menu.classList.toggle('hidden');
                menu.setAttribute('aria-expanded', menu.classList.contains('hidden') ? 'false' : 'true');
            });
        });
    </script>
    <script>
        function animatedCounter(targer, time = 200, start = 0) {
            return {
                current: 0,
                target: targer,
                time: time,
                start: start,
                updatecounter: function() {
                    start = this.start;
                    const increment = (this.target - start) / this.time;
                    const handle = setInterval(() => {
                        if (this.current < this.target) this.current += increment;
                        else {
                            clearInterval(handle);
                            this.current = this.target;
                        }
                    }, 1);
                },
            };
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.9.1/cdn.js"></script>

</body>

</html>
