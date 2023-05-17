@extends('layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Detail Inventaris</h1>
    </div>
    <div class="section-body">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th width="200px">Kode Barang</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->kode_barang}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Nama Barang</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->nama_barang}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Satuan</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->satuan}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Tahun Peroleh</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->tahun_peroleh}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Sumber Anggaran</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->sumber_anggaran}}</th>
                    </tr>
                    <tr>
                        <th width="200px">NUP</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->NUP}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Merk/Type</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->merk}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Jumlah Barang</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->jumlah}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Nilai Barang</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->nilai_barang}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Kondisi (B)</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->kondisi_baru}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Kondisi (RR)</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->kondisi_rusakRingan}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Kondisi (RB)</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->kondisi_rusakBerat}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Kondisi (Hilang)</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->kondisi_hilang}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Pelebelan (S)</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->pelebelan_sudah}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Nama Pengguna (Unit)</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->namapengguna_unit}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Nama Pengguna (Individu)</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->namapengguna_individu}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Nama Gedung</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->nama_gedung}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Nama Ruangan</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->nama_ruangan}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Nama Ruangan</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->tempat}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Keterangan</th>
                        <th width="30px">:</th>
                        <th>{{ $inventaris->keterangan}}</th>
                    </tr>
                </table>
                <br>
                <tr>
                    <th><a href="{{ route('inventaris.index') }}" class="btn btn-primary">Kembali</a></th>
                </tr>
            </div>
        </div>
    </div>
</section>
@endsection
