@extends('layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tambah Persediaan</h1>
    </div>
</section>
<div class="modal-body">
    <form class="main-form" action="{{ route('persediaan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- @method('PUT') -->
        <div class="mb-3">
            <label for="" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" placeholder="Nama Barang" class="form-control @error('nama_barang') is-invalid @enderror" value="{{old('nama_barang')}}">
            @error('nama_barang')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="div-3">
            <label for="" class="form-label">Merk/Type</label>
            <input type="text" name="merk" placeholder="Mrek/Type" class="form-control @error('merk') is-invalid @enderror" value="{{old('merk')}}">
            @error('merk')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <br>
        <div class="mb-3">
            <label for="" class="form-label">Satuan Barang</label>
            <input type="text" name="satuan" placeholder="Satuan Barang" class="form-control @error('satuan') is-invalid @enderror" value="{{old('satuan')}}">
            @error('satuan')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="div-3">
            <label for="" class="form-label">Volume Barang (Saldo Awal)</label>
            <input type="text" name="volumeBarang_saldo" placeholder="Volume Barang (Saldo Awal)" class="form-control @error('volumeBarang_saldo') is-invalid @enderror" value="{{old('volumeBarang_saldo')}}">
            @error('volumeBarang_saldo')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <br>
        <div class="div-3">
            <label for="" class="form-label">Volume Barang (Masuk)</label>
            <input type="text" name="volumeBarang_masuk" placeholder="Volume Barang (Masuk)" class="form-control @error('volumeBarang_masuk') is-invalid @enderror" value="{{old('volumeBarang_masuk')}}">
            @error('volumeBarang_masuk')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <br>
        <div class="div-3">
            <label for="" class="form-label">Volume Barang (Keluar)</label>
            <input type="text" name="volumeBarang_keluar" placeholder="Volume Barang (Keluar)" class="form-control @error('volumeBarang_keluar') is-invalid @enderror" value="{{old('volumeBarang_keluar')}}">
            @error('volumeBarang_keluar')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <br>
        <div class="div-3">
            <label for="" class="form-label">Volume Barang (Sisa)</label>
            <input type="text" name="volumeBarang_sisa" placeholder="Volume Barang (Sisa)" class="form-control @error('volumeBarang_sisa') is-invalid @enderror" value="{{old('volumeBarang_sisa')}}">
            @error('volumeBarang_sisa')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <br>
        <div class="div-3">
            <label for="" class="form-label">Harga Satuan</label>
            <input type="text" name="harga_satuan" placeholder="Harga Satuan" class="form-control @error('harga_satuan') is-invalid @enderror" value="{{old('harga_satuan')}}">
            @error('harga_satuan')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <br>
        <div class="div-3">
            <label for="" class="form-label">Jumlah</label>
            <input type="text" name="jumlah" placeholder="Jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{old('jumlah')}}">
            @error('jumlah')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <br>
            <!-- <div class="form-group">
                <div class="col-sm-2"> -->
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="{{route('persediaan.index')}}" class="btn btn-secondary">Batal</a>
                <!-- </div>
            </div> -->
    </form>
</div>

@endsection
