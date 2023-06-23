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
            <th class="kop"><img src="assets/img/polindra.png" alt="logo" width="50"></th>
            <th colspan="2">JURUSAN TEKNIK INFORMATIKA <br>
                POLITEKNIK NEGERI INDRAMAYU
            </th>
        </tr>
        <tr>
            <td class="kop">FORMULIR</td>
            <td class="kop">REKOMENDASI PEMINJAMAN BARANG INVENTARIS </td>
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
                <td width="100%">: {{ $pinjam->nama_dosen }}</td>
            </tr>
            <tr>
                <td width="100%">Jurusan</td>
                <td width="100%">: {{ $pinjam->jurusan }}</td>
            </tr>
            <tr>
                <td width="100%">Program Studi / Kelas</td>
                <td width="100%">: {{ $pinjam->program_studi }} / {{ $pinjam->kelas }} </td>
            </tr>
            <tr>
                <td width="100%">Nama Kegiatan</td>
                <td width="100%">: {{ $pinjam->nama_kegiatan }}</td>
            </tr>
            <tr>
                <td width="100%">Tanggal Meminjam</td>
                <td width="100%">: {{ Carbon\Carbon::parse($pinjam->tanggal)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td width="100%">Rancana Kembali Tanggal</td>
                <td width="100%">: {{ Carbon\Carbon::parse($pinjam->tanggal_kembali)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td width="100%">Untuk meminjam barang/alat sebagai berikut</td>
                <td width="100%">:</td>
            </tr>
        </table>
        <br>
        <table style="width:100%" class="withBorder">
            <tr align="center">
                <th width="30">No</th>
                <th width="100%">Nama Barang/Alat</th>
                <th width="100%">Kode Barang</th>
                <th width="100%">Jumlah</th>
                <th width="100%">Keterangan</th>
            </tr>
        </table>
        <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($pinjam->details as $details)
                        <tr class="gr">
                            <th class="gr" width="30">{{ $no++ }}</th>
                            <th class="gr">{{ $details->barang->nama_barang }}</th>
                            <th class="gr">{{ $details->barang->kode_barang }}</th>
                            <th class="gr" style="text-align: right">{{ $details->jumlah }}</th>
                        </tr>
                    @endforeach
                </tbody>
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
