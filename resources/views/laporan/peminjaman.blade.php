<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman Barang/Alat</title>
</head>
<style>
    .withBorder {
        border: 1px solid black;
        border-collapse: collapse;
    }

    .kop {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
    }

    .ttd {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
    }
</style>

<body>
    <table style="width:100%" border="0">
        <tr>
            <th>LAPORAN PEMINJAMAN BARANG<br>
                JURUSAN TEKNIK INFORMATIKA
            </th>
        </tr>
    </table>
    <br>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Tanggal Kembali</th>
            <th>Dosen Peminjam</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Program Studi</th>
            <th>Nama Kegiatan</th>
            <th>Yang Menyerahkan</th>
            <th>Yang Mengambil</th>
            <th>Keterarangan</th>
        </tr>
        <tbody>
            @php
                    $no = 1;
                @endphp
            @foreach ($peminjaman as $details)
                <tr>
                    <th class="gr" width="30">{{ $no++ }}</th>
                    <th>{{ Carbon\Carbon::parse($details->tanggal)->format('d-m-Y') }}</th>
                    <th>{{ Carbon\Carbon::parse($details->tanggal_kembali)->format('d-m-Y') }}</th>
                    <th>{{ $details->nama_peminjam }}</th>
                    <th>{{ $details->kelas }}</th>
                    <th>{{ $details->jurusan }}</th>
                    <th>{{ $details->program_studi }}</th>
                    <th>{{ $details->nama_kegiatan }}</th>
                    <th>{{ $details->petugas }}</th>
                    <th>{{ $details->mengambil }}</th>
                    <th>{{ $details->keterangan }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
</html>

