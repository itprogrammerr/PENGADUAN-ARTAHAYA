<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="canonical" href="https://pengaduan.bankarthaya.com" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTHAYA SUPPORT</title>

    <!-- Meta SEO -->
    <meta name="title" content="ARTHAYA SUPPORT - PT BPR ARTHAYA INDOTAMA PUSAKA">
    <meta name="description"
        content="Pengaduan dari nasabah Bank Arthaya. Laporkan masalah atau pengalaman Anda dengan layanan kami.">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="author" content="IT Programmer Bank Arthaya" />

    <!-- Social media share -->
    <meta property="og:title" content=ARTHAYA SUPPORT - PT BPR ARTHAYA INDOTAMA PUSAKA>
    <meta property="og:site_name" content=Arthaya Support>
    <meta property="og:url" content=https://pengaduan.bankarthaya.com />
    <meta property="og:description"
        content="Pengaduan dari nasabah Bank Arthaya. Laporkan masalah atau pengalaman Anda
        dengan layanan kami.">
    <meta property="og:type" content="">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:creator" content="@yoga_1721" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</head>

<body>
    <header class="fixed w-full">
        <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900 ">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
                <a href="https://pengaduan.bankarthaya.com/" class="flex items-center">
                    <img src="{{ asset('assets/img/favicon.png') }}" class="h-6 mr-3 sm:h-9" alt="Landwind Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Arthaya
                        Support</span>
                </a>
                <div class="flex items-center lg:order-2">
                    @if (Route::has('login'))
                        @auth
                            @if (auth()->user()->roles == 'USER')
                                <a href="{{ route('masyarakat-dashboard') }}"
                                    class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ url('admin') }}"
                                    class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">
                                    Dashboard
                                </a>
                            @endif
                        @else
                            <a href="{{ url('login') }}"
                                class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">
                                Masuk
                            </a>
                        @endauth
                    @endif
                    <button data-collapse-toggle="mobile-menu-2" type="button"
                        class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="{{ url('/') }}"
                                class="block py-2 pl-3 pr-4 text-white bg-purple-700 rounded lg:bg-transparent lg:text-purple-700 lg:p-0 dark:text-white"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#about"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">About</a>
                        </li>
                        <li>
                            <a href="#form"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Form</a>
                        </li>
                        <li>
                            <a href="#faq"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">FAQ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Start block -->
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
                    Layanan Pengaduan <br>Bank Arthaya</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    Temui kenyamanan dalam pengalaman perbankan Anda dengan Layanan Pengaduan Bank Arthaya. Kami hadir
                    untuk mendengarkan dan membantu memecahkan setiap masalah perbankan Anda. </p>

                <div class="text-center">
                    <p
                        class="max-w-2xl mb-6 font-semibold text-gray-700 text-lg lg:mb-8 md:text-xl lg:text-2xl dark:text-gray-400">
                        Cepat, Sederhana, Terpercaya
                    </p>
                </div>
                <div class="text-center">
                    {{-- <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4"> --}}
                    <a style="background-color: blue" href="#form"
                        class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-center  border text-white border-gray-200 rounded-lg sm:w-auto hover:bg-gray-500 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        Laporkan !
                    </a>
                    {{-- </div> --}}
                </div>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="https://res.cloudinary.com/dipfvauae/image/upload/v1698048861/hppsdflysumbohomws4m.gif"
                    alt="hero image">
            </div>
        </div>
    </section>
    <!-- End block -->
    <!-- icon bank block -->
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 pb-8 mx-auto lg:pb-16">
            <div
                class="grid grid-cols-2 gap-8 text-gray-500 sm:gap-12 sm:grid-cols-3 lg:grid-cols-6 dark:text-gray-400">
                <a href="#" class="flex items-center lg:justify-center">
                    <img src="https://bankarthaya.com/wp-content/uploads/2022/06/Ayo-Ke-Bank.png" alt=""
                        class="h-20 hover:text-gray-900 dark:hover:text-white" alt="ayo-ke-bank">
                </a>
                <a href="#" class="flex items-center lg:justify-center">
                    <img src="https://bankarthaya.com/wp-content/uploads/2022/06/BI.png"
                        class="h-20 hover:text-gray-900 dark:hover:text-white" alt="bank-indonesia">
                </a>
                <a href="#" class="flex items-center lg:justify-center">
                    <img src="https://bankarthaya.com/wp-content/uploads/2022/06/OJK.png" alt="ojk"
                        class="h-20 hover:text-gray-900 dark:hover:text-white">
                </a>
                <a href="#" class="flex items-center lg:justify-center">
                    <img src="https://bankarthaya.com/wp-content/uploads/2023/07/logo-kotak.png" alt="bank-arthaya"
                        class="h-20">
                </a>
                <a href="#" class="flex items-center lg:justify-center">
                    <img src="https://bankarthaya.com/wp-content/uploads/2022/06/LPS.png" alt="lps"
                        class="h-20">
                </a>
                <a href="#" class="flex items-center lg:justify-center">
                    <img src="https://bankarthaya.com/wp-content/uploads/2022/06/Ayo-Ke-Bank.png" alt="ayo-ke-bank"
                        class="h-20">
                </a>
            </div>
        </div>
    </section>
    <!-- End block -->
    <!-- fast-integrated block -->
    <section id="about" class="bg-gray-50 dark:bg-gray-800">
        <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
            <!-- Row -->
            <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
                <img class="hidden w-full mb-4 rounded-lg lg:mb-0 lg:flex"
                    src="https://res.cloudinary.com/dipfvauae/image/upload/v1698048798/lvoslraboarkh4xpbnlf.gif"
                    alt="dashboard feature image">
                <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Sambut
                        Kemudahan Layanan Kami</h2>
                    <p class="mb-8 font-light lg:text-xl">Arthaya Support, tempat di mana kenyamanan dan kemudahan
                        bertemu dalam satu layanan terpadu. Dengan teknologi terkini, tim berpengalaman, dan pelayanan
                        yang responsif, kami berkomitmen untuk menyediakan solusi perbankan yang memahami dan memenuhi
                        kebutuhan Anda. Bersama kami, nikmati layanan perbankan yang cepat, sederhana, dan terpercaya.
                        Sambutlah masa depan keuangan Anda dengan kemudahan yang sejati, hanya di Bank Arthaya.</p>
                    <!-- List -->
                    <ul role="list" class="pt-8 space-y-5 border-t border-gray-200 my-7 dark:border-gray-700">
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Tulis
                                Laporan</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Verifikasi
                                Laporan</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Tindak
                                Lanjut</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span
                                class="text-base font-medium leading-tight text-gray-900 dark:text-white">Selesai</span>
                        </li>
                    </ul>
                    <p class="mb-8 font-light lg:text-xl">
                        Nikmati pengalaman perbankan tanpa hambatan dengan Bank Arthaya. Layanan yang cepat, sederhana,
                        dan terpercaya.
                    </p>
                </div>
            </div>
            <!-- Row -->
            <div id="form" class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
                <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Ajukan
                        Laporan anda</h2>

                    <p class="font-light lg:text-xl">Kami akan memberi tahu anda melalui e-mail untuk memastikan anda
                        tetap bisa mengikuti proses laporan.</p>
                </div>
                <div class="mt-3 text-gray-500 sm:text-lg dark:text-gray-400">
                    <form action="{{ route('guest.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <p class="mb-2 flex items-center text-sm text-gray-900 dark:text-white">E-mail <button
                                    data-popover-target="popover-description" data-popover-placement="top-start"
                                    type="button"><svg class="w-4 h-4 ml-2 text-gray-400 hover:text-gray-500"
                                        aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                            clip-rule="evenodd"></path>
                                    </svg><span class="sr-only">Show information</span></button></p>
                            <div data-popover id="popover-description" role="tooltip"
                                class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                <div class="p-3 space-y-2">
                                    Email digunakan untuk melakukan update informasi pengaduan
                                </div>
                                <div data-popper-arrow></div>
                            </div>

                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="email" name="email" type="email" required>
                        </div>
                        <div class="mb-6">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Laporan</label>
                            <textarea id="description" name="description" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Tulis disini..." required></textarea>
                        </div>
                        <div class="mb-6">
                            <label for="image"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lampiran
                                <span class="text-red-500">(wajib, max: 2 Mb)</span></label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="image" id="image" name="image" type="file"
                                accept="image/*" required>
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 justify-end">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End block -->
    <!-- Start block -->
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 pb-8 mx-auto lg:pb-24 lg:px-6 ">
            <h2 id="faq"
                class="mb-6 text-3xl font-extrabold tracking-tight text-center text-gray-900 lg:mb-8 lg:text-3xl dark:text-white">
                Pertanyaan yang sering diajukan</h2>
            <div class="max-w-screen-md mx-auto">
                <div id="accordion-flush" data-accordion="collapse"
                    data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                    data-inactive-classes="text-gray-500 dark:text-gray-400">
                    <h3 id="accordion-flush-heading-1">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-900 bg-white border-b border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                            data-accordion-target="#accordion-flush-body-1" aria-expanded="true"
                            aria-controls="accordion-flush-body-1">
                            <span>Apa itu Arthaya Support?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-1" class="" aria-labelledby="accordion-flush-heading-1">
                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Arthaya Support adalah lebih dari sekadar
                                layanan pelanggan. Kami adalah pendengar setia yang siap membantu Anda mengatasi setiap
                                masalah dan pertanyaan. Dengan penuh perhatian, kami memberikan solusi cepat dan
                                efisien, menjadikan pengalaman pelanggan Anda lancar dan tanpa hambatan. Kami
                                berkomitmen untuk memberikan pelayanan terbaik, menjadikan setiap interaksi dengan
                                Arthaya Support tak terlupakan. Kami hadir untuk mendengar, membantu, dan melayani Anda
                                dengan sepenuh hati.</p>
                        </div>
                    </div>
                    <h3 id="accordion-flush-heading-2">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"
                            data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                            aria-controls="accordion-flush-body-2">
                            <span>Apakah Arthaya Support tersedia 24/7</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Ya, kami menyediakan dukungan pelanggan
                                24/7. Anda dapat menghubungi kami kapan saja, termasuk akhir pekan dan hari libur.</p>
                        </div>
                    </div>
                    <h3 id="accordion-flush-heading-3">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"
                            data-accordion-target="#accordion-flush-body-3" aria-expanded="false"
                            aria-controls="accordion-flush-body-3">
                            <span>Berapa lama waktu tanggapan yang dijanjikan oleh Arthaya Support?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Kami berusaha memberikan tanggapan secepat
                                mungkin. Untuk pertanyaan umum, Anda dapat mengharapkan jawaban dalam waktu 24 jam.
                                Namun, waktu tanggapan dapat bervariasi tergantung pada kompleksitas pertanyaan Anda.
                            </p>

                        </div>
                    </div>
                    <h3 id="accordion-flush-heading-4">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"
                            data-accordion-target="#accordion-flush-body-4" aria-expanded="false"
                            aria-controls="accordion-flush-body-4">
                            <span>Bagaimana jika saya tidak puas dengan tanggapan dari Arthaya Support?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">
                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Jika Anda tidak puas dengan tanggapan
                                kami, Anda dapat meminta untuk berbicara dengan supervisor atau mengajukan pengaduan
                                resmi. Kami akan memastikan bahwa keluhan Anda ditangani dengan serius dan adil.</p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End block -->
    <!-- Start block -->
    <!-- End block -->
    <footer class="bg-white dark:bg-gray-800">
        <div class="max-w-screen-xl p-4 py-6 mx-auto lg:py-16 md:p-8 lg:p-10">
            <div class="grid grid-cols-2 gap-10 md:grid-cols-3 lg:grid-cols-4">
                <div class="mb-6">
                    <div class="text-teal-600">
                        <img src="{{ asset('assets/img/favicon.png') }}" alt="logo pengaduan"
                            style="max-width: 30%; height: auto;">
                    </div>
                    <p class="mt-4 max-w-xs text-gray-500 font-bold text-2xl">
                        Arthaya Support
                    </p>

                    <p class="mt-1 max-w-xs text-gray-500 font-bold text-xs">
                        PT. BPR Arthaya Indotama Pusaka
                    </p>
                    <ul class="flex justify-start mt-5 space-x-2">
                        <li>
                            <a href="https://www.facebook.com/arthatama.arthatama.7" rel="noreferrer" target="_blank"
                                class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/bankarthaya/" rel="noreferrer" target="_blank"
                                class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://wa.me/628113666519"
                                class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 0a12 12 0 1 1 0 24 12 12 0 0 1 0-24zm.14 4.5a7.34 7.34 0 0 0-6.46 10.82l.15.26L4.5 19.5l4.08-1.3a7.38 7.38 0 0 0 10.92-6.4c0-4.03-3.3-7.3-7.36-7.3zm0 1.16c3.41 0 6.19 2.76 6.19 6.15a6.17 6.17 0 0 1-9.37 5.27l-.23-.15-2.38.76.77-2.28a6.08 6.08 0 0 1-1.17-3.6 6.17 6.17 0 0 1 6.19-6.15zM9.66 8.47a.67.67 0 0 0-.48.23l-.14.15c-.2.23-.5.65-.5 1.34 0 .72.43 1.41.64 1.71l.14.2a7.26 7.26 0 0 0 3.04 2.65l.4.14c1.44.54 1.47.33 1.77.3.33-.03 1.07-.43 1.22-.85.15-.42.15-.78.1-.85-.02-.05-.08-.08-.15-.12l-1.12-.54a5.15 5.15 0 0 0-.3-.13c-.17-.06-.3-.1-.41.09-.12.18-.47.58-.57.7-.1.1-.18.13-.32.08l-.4-.18a4.64 4.64 0 0 1-2.13-1.98c-.1-.18-.01-.28.08-.37l.27-.31c.1-.1.12-.18.18-.3a.3.3 0 0 0 .01-.26l-.1-.23-.48-1.15c-.15-.36-.3-.3-.4-.3l-.35-.02z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="tel:(+62)8113666519" rel="noreferrer" target="_blank"
                                class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.bankarthaya.com" rel="noreferrer" target="_blank"
                                class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Produk & Jasa</h3>
                    <ul class="text-gray-500 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="https://bankarthaya.com/deposito/" class="hover:underline"
                                target="_blank">Deposito</a>
                        </li>
                        <li class="mb-4">
                            <a href="https://bankarthaya.com/kredit/" class="hover:underline"
                                target="_blank">Kredit</a>
                        </li>
                        <li class="mb-4">
                            <a href="https://bankarthaya.com/tabunganku/" class="hover:underline"
                                target="_blank">TabunganKU</a>
                        </li>
                        <li class="mb-4">
                            <a href="https://bankarthaya.com/tabungan-seraya/" class="hover:underline"
                                target="_blank">Tabungan SERAYA</a>
                        </li>
                        <li class="mb-4">
                            <a href="https://bankarthaya.com/tabungan-muamalah/" class="hover:underline"
                                target="_blank">Tabungan MUAMALAH</a>
                        </li>
                        <li class="mb-4">
                            <a href="https://bankarthaya.com/simpanan-pelajar/" class="hover:underline"
                                target="_blank">Tabungan SIMPEL</a>
                        </li>
                        <li class="mb-4">
                            <a href="https://bankarthaya.com/tabungan-mapan/" class="hover:underline"
                                target="_blank">Tabungan MAPAN</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">PERUSAHAAN</h3>
                    <ul class="text-gray-500 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="https://bankarthaya.com/sejarah/" class="hover:underline"
                                target="_blank">Tentang</a>
                        </li>
                        <li class="mb-4">
                            <a href="https://recruitment.maesagroup.co.id/" target="_blank"
                                class="hover:underline">Karir</a>
                        </li>
                        <li class="mb-4">
                            <a href="https://bankarthaya.com/struktur-organisasi/" target="_blank"
                                class="hover:underline">Struktur</a>
                        </li>
                        <li class="mb-4">
                            <a href="https://bankarthaya.com/berita/" target="_blank"
                                class="hover:underline">Berita</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">TAUTAN LAIN</h3>
                    <ul class="text-gray-500 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="https://pengaduan.bankarthaya.com/" target="_blank"
                                class="hover:underline">Pengaduan Nasabah</a>
                        </li>
                        <li class="mb-4">
                            <a href="https://bankarthaya.com/saran/" target="_blank" class="hover:underline">Kritik
                                san Saran</a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
            <div class="text-center">
                <a href="#"
                    class="flex items-center justify-center mb-5 text-2xl font-semibold text-gray-900 dark:text-white">
                    <img src="{{ asset('assets/img/favicon.png') }}" class="h-6 mr-3 sm:h-9"
                        alt="Arthaya Support Logo" />
                    Arthaya Support
                </a>
                <span class="block text-sm text-center text-gray-500 dark:text-gray-400">© 2023 Arthaya Support™. All
                    Rights Reserved.
                </span>
            </div>
        </div>
    </footer>
    @include('sweetalert::alert')
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/651be03de6bed319d0055c70/1hbqe7scf';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>
