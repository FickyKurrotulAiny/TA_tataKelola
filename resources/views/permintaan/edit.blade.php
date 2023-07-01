@extends('layouts.master')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h3>
                            Edit Permintaan</h3>
                    </div>
                    <div class="card">
                    </div>
                    <div class="card-body">
                        <form class="main-form row" action="{{ route('permintaan.update', $permintaan->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">tanggal</label>
                                <input type="date" name="tanggal" placeholder="tanggal"
                                    class="form-control"value="{{ old('tanggal', $permintaan->tanggal) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nama Bahan</label>
                                <input type="text" name="nama_bahan" placeholder="Nama Bahan"
                                    class="form-control"value="{{ old('nama_bahan', $permintaan->nama_bahan) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nama Dosen</label>
                                <input type="text" name="nama_dosen" placeholder="Nama Dosen"
                                    class="form-control"value="{{ old('nama_peminjam', $permintaan->nama_dosen) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Mata Kuliah</label>
                                <input type="text" name="mata_kuliah" placeholder="Mata Kuliah"
                                    class="form-control"value="{{ old('nama_peminjam', $permintaan->mata_kuliah) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">satuan</label>
                                <input type="text" name="satuan" placeholder="satuan"
                                    class="form-control"value="{{ old('satuan', $permintaan->satuan) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Jumlah</label>
                                <input type="text" name="jumlah" placeholder="Jumlah" class="form-control"
                                    value="{{ old('jumlah', $permintaan->jumlah) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Kelas</label>
                                <input type="text" name="kelas" placeholder="Kelas"
                                    class="form-control"value="{{ old('kelas', $permintaan->kelas) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" placeholder="Keterangan"
                                    class="form-control"value="{{ old('keterangan', $permintaan->keterangan) }}">
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('permintaan.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection