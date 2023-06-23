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
    <table style="width:100%" class="withBorder">
        <tr>
            <th colspan="2">FORM PERMINTAAN BAHAN PRAKTIKUM<br>
                TEKNIK INFORMATIKA
            </th>
        </tr>
    </table>
    <table style="width:100%" border="1" class="withBorder">
        <table style="width:100%" border="0">
            <br>
            <tr>
                <td width="15%">Nama Dosen </td>
                <td>: {{ $permintaan->nama_dosen }}</td>
                <td width="15%">Kelas</td>
                <td width="15%">: {{ $permintaan->kelas }} </td>
            </tr>
            <tr>
                <td width="15%">Mata Kuliah</td>
                <td>: {{ $permintaan->mata_kuliah }}</td>
                <td width="15%">Tanggal</td>
                <td width="15%">: {{ Carbon\Carbon::parse($permintaan->tanggal)->format('d-m-Y') }}</td>
            </tr>
        </table>
        <br>
        <table style="width:100%" class="withBorder">
            <tr align="center">
                <th width="30">No</th>
                <th width="100%">Nama Bahan</th>
                <th width="100%">Jumlah</th>
                <th width="100%">Satuan</th>
                <th width="100%">Keterangan</th>
            </tr>
        </table>
        <table style="width:100%" class="withBorder">
            <tr align="center">
                <th width="30">1</th>
                <th width="100%">{{ $permintaan->nama_bahan }}</th>
                <th width="100%">{{ $permintaan->jumlah }}</th>
                <th width="100%">{{ $permintaan->satuan }}</th>
                <th width="100%">{{ $permintaan->keterangan }}</th>
            </tr>
        </table>

        <br>
        <table style="width:100%" border="0">
            <tr>
                <td width="100%">Dosen Pengampu,</td>
                <td width="100%">Yang mengambil</td>
                <td width="100%">Petugas yang memberikan,</td>
            </tr>
        </table>
        <br><br><br><br>
        <table style="width:100%" border="0">
            <tr>
                <td width="100%">...................................</td>
                <td width="100%">...................................</td>
                <td width="100%">...............................................</td>
            </tr>
        </table>
    </table>

</html>
