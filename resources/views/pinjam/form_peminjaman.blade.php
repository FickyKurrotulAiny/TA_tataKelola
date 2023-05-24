<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>
</head>
<style>
    .withBorder {
        border: 1px solid;

    }

    .border2 {
        border-right: 1px solid;
        border-bottom: 1px solid;

    }

    .border3 {
        border-bottom: 1px solid;

    }
</style>

<body>
    <table align="center" style="width: 95%;" cellpadding="1">
        <tbody>
            {{-- <tr>
                <td>
                    <img src="{{ $logo }}" alt="" height="100px" width="300px" margin="left">
                </td>
            </tr> --}}
            <tr>
                <td>
                    <div class="site-footer-colors"><i class="primary"></i><i class="secondary"></i><i
                            class="tertiary"></i><i class="white"></i></div>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <table align="center" style="width: 700px;">
        <td>
            <center>
                <font size="4"><b>Form Peminjaman Barang</b>
                </font><br>
            </center>
        </td>
    </table>
    <table border="0">
        <tr>
            <td width="170">Yang bertanda tangan dibawah ini</td>
            <td width="315">:</td>
        </tr>
        <br><br><br>
        <tr>
            <td width="170">Nama Dosen Peminjam</td>
            <td width="315">: {{ $pinjam[0]->nama_dosen }}</td>
        </tr>
        <tr>
            <td width="170">Jurusan</td>
            <td width="315">: {{ $pinjam[0]->jurusan }}</td>
        </tr>
        <tr>
            <td width="170">Program Studi</td>
            <td width="315">: {{ $pinjam[0]->program_studi }}</td>
        </tr>
        <tr>
            <td width="170">Nama Kegiatan</td>
            <td width="315">: {{ $pinjam[0]->nama_kegiatan }}</td>
        </tr>
        <tr>
            <td width="170">Tanggal Peminjam</td>
            <td width="315">: {{ Carbon\Carbon::parse($pinjam[0]->tanggal)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td width="170">Rancana Kembali Tanggal</td>
            <td width="315">: {{ Carbon\Carbon::parse($pinjam[0]->tanggal_kembali)->format('d-m-Y') }}</td>
        </tr>
        <br><br><br>
        <tr>
            <td width="170">Untuk Meminjam Barang Sebagai Berikut</td>
            <td width="315">:</td>
        </tr>
    </table>
    <br>
    <table style="width: 100%;">
        <tr align="center">
            <th class="withBorder" width="30px">No</th>
            <th class="withBorder" width="170px">Nama Barang</th>
            <th class="withBorder" width="189px">Kode Barang</th>
            <th class="withBorder" width="183px">Jumlah Barang</th>
            <th class="withBorder" width="128px">Keterangan</th>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr align="center">
            <th class="withBorder" width="30px">No</th>
            <th class="withBorder" width="170px">{{ $pinjam[0]->nama_barang }}</th>
            <th class="withBorder" width="189px">{{ $pinjam[0]->kode_barang }}</th>
            <th class="withBorder" width="183px">{{ $pinjam[0]->jumlah }}</th>
            <th class="withBorder" width="128px">{{ $pinjam[0]->keterangan }}</th>
        </tr>
    </table>

</body>

</html>
