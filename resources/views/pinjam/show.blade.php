@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card" style="width: 100%;">
                        <div class="card-header">
                            <h3>
                                Detail Peminjaman</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th width="200px">Tanggal</th>
                                        <th width="30px">:</th>
                                        <th>{{ Carbon\Carbon::parse($pinjam->tanggal)->format('d-m-Y') }}</th>
                                    </tr>
                                    <tr>
                                        <th width="200px">Nama Barang</th>
                                        <th width="30px">:</th>
                                        <th>{{ $pinjam->nama_barang }}</th>
                                    </tr>
                                    <tr>
                                        <th width="200px">Tahun Peroleh</th>
                                        <th width="30px">:</th>
                                        <th>{{ $pinjam->tahun_peroleh }}</th>
                                    </tr>
                                    <tr>
                                        <th width="200px">Jumlah Barang</th>
                                        <th width="30px">:</th>
                                        <th>{{ $pinjam->jumlah }}</th>
                                    </tr>
                                    <tr>
                                        <th width="200px">Keterangan</th>
                                        <th width="30px">:</th>
                                        <th>{{ $pinjam->keterangan }}</th>
                                    </tr>
                                    <tr>
                                        <th width="200px">Rencana Kembali Tanggal</th>
                                        <th width="30px">:</th>
                                        <th>{{ Carbon\Carbon::parse($pinjam->tanggal_kembali)->format('d-m-Y') }}</th>
                                    </tr>
                                    <tr>
                                        <th width="200px">Jurusan</th>
                                        <th width="30px">:</th>
                                        <th>{{ $pinjam->jurusan }}</th>
                                    </tr>
                                    <tr>
                                        <th width="200px">Program Studi</th>
                                        <th width="30px">:</th>
                                        <th>{{ $pinjam->program_studi }}</th>
                                    </tr>
                                    <tr>
                                        <th width="200px">Nama Kegiatan</th>
                                        <th width="30px">:</th>
                                        <th>{{ $pinjam->nama_kegiatan }}</th>
                                    </tr>
                                    <tr>
                                        <th width="200px">Nama Dosen</th>
                                        <th width="30px">:</th>
                                        <th>{{ $pinjam->nama_dosen }}</th>
                                    </tr>
                                </table>
                                <br>
                                <tr>
                                    <th><a href="{{ route('pinjam.index') }}" class="btn btn-primary">Kembali</a></th>
                                    <th><a href="{{ route('generatePDFPinjam', $pinjam->id) }}" target="_blank"
                                            class="btn btn-primary">Cetak Form</a></th>
                                </tr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
