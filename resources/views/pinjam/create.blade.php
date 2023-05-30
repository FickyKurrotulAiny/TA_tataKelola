@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Peminjaman</h1>
        </div>
    </section>
    <div class="card">
        <div class="card-body">
            <form class="main-form row" action="{{ route('pinjam.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- @method('PUT') -->
                <div class="mb-3 col-md-6 col-xl-4">
                    <label for="" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" placeholder="Tanggal"
                        class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6 col-xl-4">
                    <label for="" class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" placeholder="Nama Barang"
                        class="form-control @error('nama_barang') is-invalid @enderror" value="{{ old('nama_barang') }}">
                    @error('nama_barang')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6 col-xl-4">
                    <label for="" class="form-label">Tahun Peroleh</label>
                    <input type="text" name="tahun_peroleh" placeholder="Tahun Peroleh"
                        class="form-control @error('tahun_peroleh') is-invalid @enderror"
                        value="{{ old('tahun_peroleh') }}">
                    @error('tahun_peroleh')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6 col-xl-4">
                    <label for="" class="form-label">Jumlah Barang</label>
                    <input type="text" name="jumlah" placeholder="Jumlah Barang"
                        class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah') }}">
                    @error('jumlah')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6 col-xl-4">
                    <label for="" class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" placeholder="Keterangan"
                        class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}">
                    @error('keterangan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6 col-xl-4">
                    <label for="" class="form-label">Rencana Kembali Tanggal </label>
                    <input type="date" name="tanggal_kembali" placeholder="Rencana Kembali Tanggal"
                        class="form-control @error('tanggal_kembali') is-invalid @enderror"
                        value="{{ old('tanggal_kembali') }}">
                    @error('tanggal_kembali')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6 col-xl-4">
                    <label for="" class="form-label">Jurusan</label>
                    <input type="text" name="jurusan" placeholder="Jurusan"
                        class="form-control @error('jurusan') is-invalid @enderror" value="{{ old('jurusan') }}">
                    @error('jurusan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6 col-xl-4">
                    <label for="" class="form-label">Program Studi</label>
                    <input type="text" name="program_studi" placeholder="Program Studi"
                        class="form-control @error('program_studi') is-invalid @enderror"
                        value="{{ old('program_studi') }}">
                    @error('program_studi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6 col-xl-4">
                    <label for="" class="form-label">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" placeholder="Nama Kegiatan"
                        class="form-control @error('nama_kegiatan') is-invalid @enderror"
                        value="{{ old('nama_kegiatan') }}">
                    @error('nama_kegiatan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6 col-xl-4">
                    <label for="" class="form-label">Nama Dosen</label>
                    <input type="text" name="nama_dosen" placeholder="Nama Dosen"
                        class="form-control @error('nama_dosen') is-invalid @enderror" value="{{ old('nama_dosen') }}">
                    @error('nama_dosen')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="{{ route('pinjam.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
