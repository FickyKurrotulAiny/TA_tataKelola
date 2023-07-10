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
            <th>LAPORAN BARANG INVENTARIS<br>
                JURUSAN TEKNIK INFORMATIKA
            </th>
        </tr>
    </table>
    <br>
    <table border="1">
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Kode</th>
            <th rowspan="2">Nama</th>
            <th rowspan="2">Tahun peroleh</th>
            <th rowspan="2">Sumber Anggaran</th>
            <th rowspan="2">NUP</th>
            <th rowspan="2">Merk<br>/type</th>
            <th rowspan="2">Jumlah</th>
            <th rowspan="2">Nilai</th>
            <th colspan="4">Kondisi</th>
            <th colspan="2">Pelebelan</th>
            <th colspan="2">Pengguna</th>
            <th rowspan="2">Gedung</th>
            <th rowspan="2">Ruangan</th>
            <th rowspan="2">Ket</th>
        </tr>
        <tr>
            <th>B</th>
            <th>RR</th>
            <th>RB</th>
            <th>Hilang</th>
            <th>Belum</th>
            <th>Sudah</th>
            <th>Unit</th>
            <th>Individu</th>
        </tr>
        <tbody>
            @php
                    $no = 1;
                @endphp
            @foreach ($inventaris as $details)
                <tr>
                    <th class="gr" width="30">{{ $no++ }}</th>
                    <th>{{ $details->kode_barang }}</th>
                    <th>{{ $details->nama_barang }}</th>
                    <th>{{ $details->tahun_peroleh}}</th>
                    <th>{{ $details->sumber_anggaran }}</th>
                    <th>{{ $details->NUP }}</th>
                    <th>{{ $details->merk }}</th>
                    <th>{{ $details->jumlah }}</th>
                    <th>{{ $details->nilai_barang }}</th>
                    <th>{{ $details->kondisi_baru}}</th>
                    <th>{{ $details->kondisi_rusakRingan }}</th>
                    <th>{{ $details->kondisi_rusakBerat }}</th>
                    <th>{{ $details->kondisi_hilang }}</th>
                    <th>{{ $details->pelebelan_belum}}</th>
                    <th>{{ $details->pelebelan_sudah }}</th>
                    <th>{{ $details->namapengguna_unit }}</th>
                    <th>{{ $details->namapengguna_individu }}</th>
                    <th>{{ $details->nama_gedung}}</th>
                    <th>{{ $details->nama_ruangan }}</th>
                    <th>{{ $details->keterangan}}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
</html>
