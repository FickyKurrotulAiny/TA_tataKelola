@extends('layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Persediaan</h1>
    </div>
</section>
<div class="modal-body">
    <form class="main-form" action="{{ route('persediaan.update', $persediaan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" placeholder="Nama Barang" class="form-control"value="{{old('nama_barang', $persediaan->nama_barang)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Merk/Type</label>
            <input type="text" name="merk" placeholder="Merk/Type" class="form-control"value="{{old('merk', $persediaan->merk)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Satuan Barang</label>
            <input type="text" name="satuan" placeholder="Satuan Barang" class="form-control" value="{{old('satuan', $persediaan->satuan)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Volume Barang (Saldo Awal)</label>
            <input type="text" name="volumeBarang_saldo" placeholder="Volume Barang (Saldo Awal)" class="form-control" value="{{old('volumeBarang_saldo', $persediaan->volumeBarang_saldo)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Volume Barang (Masuk)</label>
            <input type="text" name="volumeBarang_masuk" placeholder="Volume Barang (Masuk)" class="form-control" value="{{old('volumeBarang_masuk', $persediaan->volumeBarang_masuk)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Volume Barang (Keluar)</label>
            <input type="text" name="volumeBarang_keluar" placeholder="Volume Barang (Keluar)" class="form-control" value="{{old('volumeBarang_keluar', $persediaan->volumeBarang_keluar)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Volume Barang (Sisa)</label>
            <input type="text" name="volumeBarang_sisa" placeholder="Volume Barang (Sisa)" class="form-control" value="{{old('volumeBarang_sisa', $persediaan->volumeBarang_sisa)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Harga Satuan</label>
            <input type="text" name="harga_satuan" placeholder="Harga Satuan" class="form-control" value="{{old('harga_satuan', $persediaan->harga_satuan)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Jumlah</label>
            <input type="text" name="jumlah" placeholder="Jumlah" class="form-control" value="{{old('jumlah', $persediaan->jumlah)}}">
        </div>
            <!-- <div class="form-group">
                <div class="col-sm-2"> -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('persediaan.index')}}" class="btn btn-secondary">Kembali</a>
                <!-- </div>
            </div> -->
    </form>
</div>

@endsection
