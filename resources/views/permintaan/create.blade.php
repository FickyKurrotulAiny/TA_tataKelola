@extends('layouts.master')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h3>
                            Tambah Permintaan</h3>
                    </div>
                    <div class="card">
                    </div>
                    <div class="card-body">
                        <form class="main-form row" action="{{ route('permintaan.store') }}" method="POST"
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
                                <label for="" class="form-label">Nama Bahan</label>
                                <input type="text" name="nama_bahan" placeholder="Nama Bahan"
                                    class="form-control @error('nama_bahan') is-invalid @enderror"
                                    value="{{ old('nama_bahan') }}">
                                @error('nama_bahan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Jumlah</label>
                                <input type="text" name="jumlah" placeholder="Jumlah"
                                    class="form-control @error('jumlah') is-invalid @enderror"
                                    value="{{ old('jumlah') }}">
                                @error('jumlah')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nama Dosen</label>
                                <input type="text" name="nama_dosen" placeholder="Nama Dosen"
                                    class="form-control @error('nama_dosen') is-invalid @enderror"
                                    value="{{ old('nama_dosen') }}">
                                @error('nama_dosen')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Mata Kuliah</label>
                                <input type="text" name="mata_kuliah" placeholder="Mata Kuliah"
                                    class="form-control @error('mata_kuliah') is-invalid @enderror"
                                    value="{{ old('mata_kuliah') }}">
                                @error('mata_kuliah')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Satuan</label>
                                <input type="text" name="satuan" placeholder="Satuan"
                                    class="form-control @error('satuan') is-invalid @enderror"
                                    value="{{ old('satuan') }}">
                                @error('satuan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Kelas</label>
                                <input type="text" name="kelas" placeholder="Kelas"
                                    class="form-control @error('kelas') is-invalid @enderror"
                                    value="{{ old('kelas') }}">
                                @error('kelas')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" placeholder="Keterangan"
                                    class="form-control @error('keterangan') is-invalid @enderror"
                                    value="{{ old('keterangan') }}">
                                @error('keterangan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="{{ route('permintaan.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
