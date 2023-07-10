<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang Persediaan</title>
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
            <th>LAPORAN PERSEDIAAN BARANG<br>
                JURUSAN TEKNIK INFORMATIKA
            </th>
        </tr>
    </table>
    <br>
    <table border="1">
        <tr>
            <th rowspan="2">NO</th>
            <th rowspan="2">NAMA BARANG</th>
            <th rowspan="2">SATUAN</th>
            <th colspan="4">VOLUME BARANG</th>
            <th rowspan="2">HARGA SATUAN</th>
            <th rowspan="2">JUMLAH</th>
        </tr>
        <tr>
            <th>SALDO AWAL</th>
            <th>MASUK</th>
            <th>KELUAR</th>
            <th>SISA</th>
        </tr>
        <tbody>
            @php
                    $no = 1;
                @endphp
            @foreach ($persediaan as $details)
                <tr>
                    <th class="gr" width="30">{{ $no++ }}</th>
                    <th>{{ $details->nama_barang }}</th>
                    <th>{{ $details->satuan }}</th>
                    <th>{{ $details->volumeBarang_saldo }}</th>
                    <th>{{ $details->volumeBarang_masuk }}</th>
                    <th>{{ $details->volumeBarang_keluar }}</th>
                    <th>{{ $details->volumeBarang_sisa }}</th>
                    <th>{{ $details->harga_satuan }}</th>
                    <th>{{ $details->jumlah }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
</html>
