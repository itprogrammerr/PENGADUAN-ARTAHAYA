<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            margin: 20px;
            padding: 20px;
        }

        .header,
        .footer {
            text-align: center;
            margin: 10px 0;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            background-color: #f2f2f2;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <div class="header">
        <div style="text-align: right;">
            <h6>{{ $pengaduan->created_at->format('l, d F Y') }}</h6>
        </div>
        <h2>Layanan Pengaduan Masyarakat Online</h2>
        <p><a href="https://www.bankarthaya.com/" target="_blank">www.bankarthaya.com</a></p>
    </div>
    <hr>
    <div class="mt-3 mb-3">
        <table class="table table-noborder">
            <tr>
                <td style="width: 20%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td>{{ $pengaduan->name }}</td>
            </tr>
            <tr>
                <td style="width: 20%;">NIK</td>
                <td style="witdth: 5%;">:</td>
                <td>{{ $pengaduan->user_nik }}</td>
            </tr>
            <tr>
                <td style="width: 20%;">No. Telepon</td>
                <td style="width:5%">:</td>
                <td>{{ $pengaduan->user->phone }}</td>
            </tr>
        </table>
    </div>

    <table class="table table-bordered">
        <thead class="thead">
            <tr>
                <th scope="col">Laporan Pengaduan</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{-- <img style="max-width: 50%; height:auto"
                        src="{{ asset('file/laporan') }}/image/{{ $pengaduan->image }}" alt="" loading="lazy" />
                    <br> --}}
                    {{ $pengaduan->description }}
                </td>
                <td>{{ $pengaduan->status }}</td>
            </tr>
        </tbody>
    </table>

    {{-- <div class="footer">
        <p>www.bankarthaya.com - {{ now()->format('d F Y') }}</p>
    </div> --}}
</body>

</html>
