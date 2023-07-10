<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Permintaan Barang/Alat</title>
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
            <th colspan="2">LAPORAN PERRMINTAAN BARANG<br>
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
            <thead>
                <th width="30">No</th>
                <th >Nama Bahan</th>
                <th >Jumlah</th>
                <th >Satuan</th>
                <th >Merk</th>
                <th >Keterangan</th>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($permintaan->details as $details)
                    <tr class="gr">
                        <th class="gr" width="30">{{ $no++ }}</th>
                        <th>{{ $details->barang->nama_barang }}</th>
                        <th>{{ $details->jumlah }}</th>
                        <th>{{ $details->barang->satuan }}</th>
                        <th>{{ $details->barang->merk }}</th>
                        <th>{{ $permintaan->keterangan }}</th>
                    </tr>
                @endforeach
            </tbody>
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
