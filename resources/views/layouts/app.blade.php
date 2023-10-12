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

    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}">
    <title>@yield('title') | Arthaya Support</title>

    @stack('prepend-style')
    @include('includes.admin.style')
    @stack('addon-style')

</head>

<body>
    @include('includes.admin.navbar')
    @yield('content')

    @stack('prepend-script')
    @include('includes.admin.script')
    @stack('addon-script')
</body>

</html>
