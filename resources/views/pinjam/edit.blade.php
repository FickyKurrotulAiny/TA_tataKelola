@extends('layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Peminjaman</h1>
    </div>
</section>
<div class="modal-body">
    <form class="main-form" action="{{ route('pinjam.update', $peminjaman->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Tanggal</label>
            <input type="text" name="tanggal" placeholder="Tanggal" class="form-control"value="{{old('tanggal', $peminjaman->tanggal)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" placeholder="Nama Barang" class="form-control"value="{{old('nama_barang', $peminjaman->nama_barang)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tahun Peroleh</label>
            <input type="text" name="tahun_peroleh" placeholder="Tahun Peroleh" class="form-control"value="{{old('tahun_peroleh', $peminjaman->tahun_peroleh)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Jumlah Barang</label>
            <input type="text" name="jumlah" placeholder="Jumlah Barang" class="form-control"value="{{old('jumlah', $peminjaman->jumlah)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Keterangan</label>
            <input type="text" name="keterangan" placeholder="Keterangan" class="form-control" value="{{old('keterangan', $peminjaman->keterangan)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Rencana Kembali Tanggal</label>
            <input type="text" name="tanggal_kembali" placeholder="Rencana Kembali Tanggal" class="form-control"value="{{old('tanggal_kembali', $peminjaman->tanggal_kembali)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Jurusan</label>
            <input type="text" name="jjurusan" placeholder="Jurusan" class="form-control"value="{{old('jjurusan', $peminjaman->jjurusan)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Program Studi</label>
            <input type="text" name="program_studi" placeholder="Program Studi" class="form-control"value="{{old('program_studi', $peminjaman->program_studi)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" placeholder="Nama Kegiatan" class="form-control"value="{{old('nama_kegiatan', $peminjaman->nama_kegiatan)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nama Dosen</label>
            <input type="text" name="nama_dosen" placeholder="Nama Dosen" class="form-control"value="{{old('nama_dosen', $peminjaman->nama_dosen)}}">
        </div>
            <!-- <div class="form-group">
                <div class="col-sm-2"> -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('pinjam.index')}}" class="btn btn-secondary">Kembali</a>
                <!-- </div>
            </div> -->
    </form>
</div>

@endsection
