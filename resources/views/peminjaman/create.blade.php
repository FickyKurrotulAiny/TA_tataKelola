@extends('layouts.master')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h3>
                            Tambah Peminjaman</h3>
                    </div>
                    <div class="card">
                    </div>
                        <div class="card-body">
                            <form class="main-form row" action="{{ route('peminjaman.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- @method('PUT') -->
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" placeholder="Tanggal"
                                        class="form-control @error('tanggal') is-invalid @enderror"
                                        value="{{ old('tanggal') }}">
                                    @error('tanggal')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Kode Barang</label>
                                    <input type="text" name="kode_barang" placeholder="Kode Barang"
                                        class="form-control @error('kode_barang') is-invalid @enderror"
                                        value="{{ old('kode_barang') }}">
                                    @error('kode_barang')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Nama Barang</label>
                                    <input type="text" name="nama_barang" placeholder="Nama Barang"
                                        class="form-control @error('nama_barang') is-invalid @enderror"
                                        value="{{ old('nama_barang') }}">
                                    @error('nama_barang')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Jumlah Barang</label>
                                    <input type="text" name="jumlah_barang" placeholder="Jumlah Barang"
                                        class="form-control @error('jumlah_barang') is-invalid @enderror"
                                        value="{{ old('jumlah_barang') }}">
                                    @error('jumlah_barang')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Nama Peminjam</label>
                                    <input type="text" name="nama_peminjam" placeholder="Nama Peminjam"
                                        class="form-control @error('nama_peminjam') is-invalid @enderror"
                                        value="{{ old('nama_peminjam') }}">
                                    @error('nama_peminjam')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Jurusan</label>
                                    <input type="text" name="jurusan" placeholder="Jurusan"
                                        class="form-control @error('jurusan') is-invalid @enderror"
                                        value="{{ old('jurusan') }}">
                                    @error('jurusan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Petugas Yang Menyerahkan</label>
                                    <input type="text" name="petugas" placeholder="Petugas Yang Menyerahkan"
                                        class="form-control @error('petugas') is-invalid @enderror"
                                        value="{{ old('petugas') }}">
                                    @error('petugas')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Yang Mengambil</label>
                                    <input type="text" name="mengambil" placeholder="Yang Mengambil"
                                        class="form-control @error('mengambil') is-invalid @enderror"
                                        value="{{ old('mengambil') }}">
                                    @error('mengambil')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Tanggal Kembali</label>
                                    <input type="date" name="tanggal_kembali" placeholder="Tanggal Kembali"
                                        class="form-control @error('tanggal_kembali') is-invalid @enderror"
                                        value="{{ old('tanggal_kembali') }}">
                                    @error('tanggal_kembali')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
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
    </div>
@endsection
