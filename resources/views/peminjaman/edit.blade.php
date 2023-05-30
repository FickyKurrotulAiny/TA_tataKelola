@extends('layouts.master')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h3>
                            Edit Peminjaman</h3>
                    </div>
                    <div class="card">
                    </div>
                    <div class="card-body">
                        <form class="main-form row" action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">tanggal</label>
                                <input type="date" name="tanggal" placeholder="tanggal"
                                    class="form-control"value="{{ old('tanggal', $peminjaman->tanggal) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Kode Barang</label>
                                <input type="text" name="kode_barang" placeholder="Kode Barang"
                                    class="form-control"value="{{ old('kode_barang', $peminjaman->kode_barang) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nama Barang</label>
                                <input type="text" name="nama_barang" placeholder="Nama Barang"
                                    class="form-control"value="{{ old('nama_barang', $peminjaman->nama_barang) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Jumlah Barang</label>
                                <input type="text" name="jumlah_barang" placeholder="Jumlah Barang" class="form-control"
                                    value="{{ old('jumlah_barang', $peminjaman->jumlah_barang) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nama Peminjam</label>
                                <input type="text" name="nama_peminjam" placeholder="Nama Peminjam"
                                    class="form-control"value="{{ old('nama_peminjam', $peminjaman->nama_peminjam) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Jurusan</label>
                                <input type="text" name="jurusan" placeholder="Jurusan"
                                    class="form-control"value="{{ old('jurusan', $peminjaman->jurusan) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Petugas Yang Menyerahkan</label>
                                <input type="text" name="petugas" placeholder="Petugas Yang Menyerahkan"
                                    class="form-control"value="{{ old('petugas', $peminjaman->petugas) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Yang Mengambil</label>
                                <input type="text" name="mengambil" placeholder="Yang Mengambil"
                                    class="form-control"value="{{ old('mengambil', $peminjaman->mengambil) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Tanggal Kembali</label>
                                <input type="date" name="tanggal_kembali" placeholder="Tanggal Kembali"
                                    class="form-control"value="{{ old('tanggal_kembali', $peminjaman->tanggal_kembali) }}">
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
