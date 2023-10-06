<!DOCTYPE html>
<html lang="en">

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
    <title>PENGADUAN NASABAH BANK ARTHAYA</title>

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
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>


<body>
    <nav class="flex items-center justify-between flex-wrap bg-purple-300 p-4 lg:p-7 px-4 lg:px-20">

        <div class="flex items-center justify-between flex-wrap">
            <img src="{{ asset('assets/img/favicon.png') }}" alt=""
                class="transform transition hover:scale-125 duration-300 ease-in-out"
                style="max-width: 20%; height: auto;" />
            <span class="font-bold tracking-wider text-2xl">Pengaduan Bank</span>
            <div class="block lg:hidden">
                <button id="menu-toggle"
                    class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="w-full hidden lg:flex lg:items-center lg:w-auto text-center" id="menu">
            <div class="text-md lg:flex-grow">
                <a href="{{ url('/') }}" class="block mt-4 lg:inline-block lg:mt-0 text-black mr-4">
                    Home
                </a>
                <a href="#how" class="block mt-4 lg:inline-block lg:mt-0 text-black mr-4">
                    Tata Cara
                </a>
            </div>
            <div class="d-flex space-x-4 justify-content-center">
                <button
                    class="text-black font-normal rounded-md py-2 px-4 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    <a href="{{ url('login') }}" style="font-weight: bold;">Masuk</a>
                </button>
                <button
                    class="text-blue-500 font-medium rounded-md py-2 px-4 border-2 border-white focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    <a href="{{ url('register') }}" style="font-weight: bold;">Daftar</a>
                </button>
            </div>
        </div>
    </nav>

    <!-- Header -->

    <!--Hero-->
    <div class="pt-10 px-16 bg-purple-200">
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
            <div
                class="w-full md:w-2/5 justify-center items-start text-center md:text-left text-gray-800 hidden md:block">
                <img class="object-fill mx-auto sm:mx-36 transform transition hover:scale-110 duration-300 ease-in-out"
                    src="{{ asset('img/melayani.png') }}" alt="Melayani" />
            </div>
        </div>
    </div>

    <!-- How -->
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
    <footer class="text-center font-medium bg-purple-400 py-5">
        © <span id="currentYear"></span> PENGADUAN NASABAH BANK ARTHAYA
    </footer>
    @include('sweetalert::alert')
    <script>
        // Tambahkan script berikut untuk menangani klik pada tombol toggle
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');

        menuToggle.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
    <script>
        const currentYear = new Date().getFullYear();
        document.getElementById('currentYear').textContent = currentYear;
    </script>
</body>

</html>
