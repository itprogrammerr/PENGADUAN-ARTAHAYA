<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

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

    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}">
    <title>@yield('title') | Arthaya Support</title>

    @include('includes.admin.style')
    <style>
        @media (min-width: 768px) {
            .logo {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('includes.masyarakat.sidebar')
        <div class="flex flex-col flex-1 w-full">
            @include('includes.masyarakat.navbar')
            @yield('content')
            @include('includes.masyarakat.footer')
        </div>
    </div>
    @include('sweetalert::alert')
    @include('includes.masyarakat.script')
</body>

</html>
