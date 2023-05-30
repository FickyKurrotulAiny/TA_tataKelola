@extends('layouts.master')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h3>
                            Detail Peminjaman</h3>
                    </div>
                    <div class="card">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tr>
                                    <th width="210px">Tanggal</th>
                                    <th width="30px">:</th>
                                    <th>{{ Carbon\Carbon::parse($peminjaman->tanggal)->format('d-m-Y') }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Kode Barang</th>
                                    <th width="30px">:</th>
                                    <th>{{ $peminjaman->kode_barang }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Nama Barang</th>
                                    <th width="30px">:</th>
                                    <th>{{ $peminjaman->nama_barang }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Jumlah Barang</th>
                                    <th width="30px">:</th>
                                    <th>{{ $peminjaman->jumlah_barang }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Nama Peminjam</th>
                                    <th width="30px">:</th>
                                    <th>{{ $peminjaman->nama_peminjam }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Jurusan</th>
                                    <th width="30px">:</th>
                                    <th>{{ $peminjaman->jurusan }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Petugas Yang Menyerahkan</th>
                                    <th width="30px">:</th>
                                    <th>{{ $peminjaman->petugas }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Yang Mengambil</th>
                                    <th width="30px">:</th>
                                    <th>{{ $peminjaman->mengambil }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Tanggal Kembali</th>
                                    <th width="30px">:</th>
                                    <th>{{ Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d-m-Y') }}</th>
                                </tr>
                            </table>
                            <br>
                            <tr>
                                <th><a href="{{ route('peminjaman.index') }}" class="btn btn-primary">Kembali</a></th>
                            </tr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
