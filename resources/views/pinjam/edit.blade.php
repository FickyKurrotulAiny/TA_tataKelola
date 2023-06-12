@extends('layouts.master')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h3>
                            Edit peminjaman</h3>
                    </div>
                    <div class="card">
                    </div>
                        <div class="card-body">
                            <form class="main-form row" action="{{ route('pinjam.update', $pinjam->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Tanggal</label>
                                    <input type="text" name="tanggal" placeholder="Tanggal"
                                        class="form-control"value="{{ old('tanggal', $pinjam->tanggal) }}">
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Nama Barang</label>
                                    <input type="text" name="nama_barang" placeholder="Nama Barang"
                                        class="form-control"value="{{ old('nama_barang', $pinjam->nama_barang) }}">
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Tahun Peroleh</label>
                                    <input type="text" name="tahun_peroleh" placeholder="Tahun Peroleh"
                                        class="form-control"value="{{ old('tahun_peroleh', $pinjam->tahun_peroleh) }}">
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Jumlah Barang</label>
                                    <input type="text" name="jumlah" placeholder="Jumlah Barang"
                                        class="form-control"value="{{ old('jumlah', $pinjam->jumlah) }}">
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan" placeholder="Keterangan" class="form-control"
                                        value="{{ old('keterangan', $pinjam->keterangan) }}">
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Rencana Kembali Tanggal</label>
                                    <input type="text" name="tanggal_kembali" placeholder="Rencana Kembali Tanggal"
                                        class="form-control"value="{{ old('tanggal_kembali', $pinjam->tanggal_kembali) }}">
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Jurusan</label>
                                    <input type="text" name="jurusan" placeholder="Jurusan"
                                        class="form-control"value="{{ old('jurusan', $pinjam->jurusan) }}">
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Program Studi</label>
                                    <input type="text" name="program_studi" placeholder="Program Studi"
                                        class="form-control"value="{{ old('program_studi', $pinjam->program_studi) }}">
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Kelas</label>
                                    <input type="text" name="kelas" placeholder="Kelas"
                                        class="form-control"value="{{ old('kelas', $pinjam->kelas) }}">
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Nama Kegiatan</label>
                                    <input type="text" name="nama_kegiatan" placeholder="Nama Kegiatan"
                                        class="form-control"value="{{ old('nama_kegiatan', $pinjam->nama_kegiatan) }}">
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Nama Dosen</label>
                                    <input type="text" name="nama_dosen" placeholder="Nama Dosen"
                                        class="form-control"value="{{ old('nama_dosen', $pinjam->nama_dosen) }}">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('pinjam.index') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
