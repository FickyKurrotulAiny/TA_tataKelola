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
    <table style="width:100%">
        <tr>
            <th class="kop"><img src="assets/img/polindra.png" alt="logo" width="50"></th>
            <th class="kop" colspan="2">JURUSAN TEKNIK INFORMATIKA <br>
                POLITEKNIK NEGERI INDRAMAYU
            </th>
        </tr>
        <tr>
            <td class="kop">FORMULIR</td>
            <td class="kop">PEMINJAMAN DAN PENGEMBALIAN BARANG/ALAT</td>
            <td class="kop">No.FR.PPAP.01</td>
        </tr>
    </table>
    <br>
    <table style="width:100%" border="1" class="withBorder">
        <table style="width:100%" border="0">
            <tr>
                <td width="100%">Yang bertanda tangan dibawah ini : </td>
            </tr>
            <tr>
                <td width="100%">Nama Dosen Peminjam</td>
                <td width="100%">: {{ $pinjam[0]->nama_dosen }}</td>
            </tr>
            <tr>
                <td width="100%">Jurusan</td>
                <td width="100%">: {{ $pinjam[0]->jurusan }}</td>
            </tr>
            <tr>
                <td width="100%">Program Studi / Kelas</td>
                <td width="100%">: {{ $pinjam[0]->program_studi }} / {{ $pinjam[0]->kelas }} </td>
            </tr>
            <tr>
                <td width="100%">Nama Kegiatan</td>
                <td width="100%">: {{ $pinjam[0]->nama_kegiatan }}</td>
            </tr>
            <tr>
                <td width="100%">Tanggal Meminjam</td>
                <td width="100%">: {{ Carbon\Carbon::parse($pinjam[0]->tanggal)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td width="100%">Rancana Kembali Tanggal</td>
                <td width="100%">: {{ Carbon\Carbon::parse($pinjam[0]->tanggal_kembali)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td width="100%">Untuk meminjam barang/alat sebagai berikut</td>
                <td width="100%">:</td>
            </tr>
        </table>
        <br>
        <table style="width:100%">
            <tr align="center">
                <th class="withBorder" width="30">No</th>
                <th class="withBorder" width="100%">Nama Barang/Alat</th>
                <th class="withBorder" width="100%">Kode Barang</th>
                <th class="withBorder" width="100%">Jumlah</th>
                <th class="withBorder" width="100%">Keterangan</th>
            </tr>
        </table>
        <table style="width:100%">
            <tr align="center">
                <th class="withBorder" width="30">1</th>
                <th class="withBorder" width="100%">{{ $pinjam[0]->nama_barang }}</th>
                <th class="withBorder" width="100%">{{ $pinjam[0]->kode_barang }}</th>
                <th class="withBorder" width="100%">{{ $pinjam[0]->jumlah }}</th>
                <th class="withBorder" width="100%">{{ $pinjam[0]->keterangan }}</th>
            </tr>
        </table>
        <table style="width:100%" border="0">
            <tr font size="10">
                <td width="100%">Catatan: jika meminjam laptop/komputer sangat disarankan untuk tidak menyimpan data
                    permanen.</td>
            </tr>
            <br>
            <tr>
                <td width="100%">Jika ada kehilangan atau kerusakan yang diakibatkan kelalaian peminjam, maka tanggung
                    jawab sepenuhnya dibebankan kepada peminjam.</td>
            </tr>
        </table>
        <table style="width:100%" border="0">
            <tr>
                <td width="100%">Dosen Peminjam,</td>
                <td width="100%">Yang mengambil</td>
                <td width="100%">Petugas yang menyerahkan,</td>
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
        <table style="width:100%" border="0">
            <tr>
                <td width="100%">NIP.</td>
                <td width="100%"></td>
                <td width="100%">NIP.</td>
            </tr>
        </table>
    </table>
    <br>
    <table style="width:100%" border="1" class="withBorder">
        <table style="width:100%" border="0">
            <tr>
                <td width="100%">Telah mengembalikan barang/alat tersebut diatas pada tanggal, .......... / ........./
                    ..............</td>
            </tr>
        </table>
        <table style="width:100%" border="0">
            <tr>
                <td width="100%">Dalam keadaan :</td>
                <td width="100%">1. Baik dan Lengkap (BL)</td>
                <td width="100%">3. Rusak Ringan (RR)</td>
            </tr>
            <tr>
                <td width="100%"></td>
                <td width="100%">2. Baik Tidak Lengkap (BT)</td>
                <td width="100%">4. Rusak Berat (RB)</td>
            </tr>
        </table>
        <br>
        <table style="width:100%" border="0">
            <tr>
                <td width="100%">Yang mengembalikan,</td>
                <td width="100%"></td>
                <td width="100%">Petugas yang menerima barang,</td>
            </tr>
        </table>
        <br><br><br><br>
        <table style="width:100%" border="0">
            <tr>
                <td width="100%">...................................</td>
                <td width="100%"></td>
                <td width="100%">..................................................</td>
            </tr>
        </table>
        <table style="width:100%" border="0">
            <tr>
                <td width="100%"></td>
                <td width="100%"></td>
                <td width="100%">NIP.</td>
            </tr>
        </table>
    </table>
</body>

</html>
