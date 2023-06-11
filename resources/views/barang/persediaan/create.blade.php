@extends('layouts.master')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h3>
                            Tambah Persediaan</h3>
                    </div>
                    <div class="card">
                    </div>
                    <div class="card-body">
                        <form class="main-form row" action="{{ route('persediaan.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- @method('PUT') -->
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
                                <label for="" class="form-label">Merk/Type</label>
                                <input type="text" name="merk" placeholder="Mrek/Type"
                                    class="form-control @error('merk') is-invalid @enderror" value="{{ old('merk') }}">
                                @error('merk')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Satuan Barang</label>
                                <input type="text" name="satuan" placeholder="Satuan Barang"
                                    class="form-control @error('satuan') is-invalid @enderror" value="{{ old('satuan') }}">
                                @error('satuan')
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
                                <label for="" class="form-label">Volume Barang (Saldo Awal)</label>
                                <input type="text" name="volumeBarang_saldo" placeholder="Volume Barang (Saldo Awal)"
                                    class="form-control @error('volumeBarang_saldo') is-invalid @enderror"
                                    value="{{ old('volumeBarang_saldo') }}">
                                @error('volumeBarang_saldo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Volume Barang (Masuk)</label>
                                <input type="text" name="volumeBarang_masuk" placeholder="Volume Barang (Masuk)"
                                    class="form-control @error('volumeBarang_masuk') is-invalid @enderror"
                                    value="{{ old('volumeBarang_masuk') }}">
                                @error('volumeBarang_masuk')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Volume Barang (Keluar)</label>
                                <input type="text" name="volumeBarang_keluar" placeholder="Volume Barang (Keluar)"
                                    class="form-control @error('volumeBarang_keluar') is-invalid @enderror"
                                    value="{{ old('volumeBarang_keluar') }}">
                                @error('volumeBarang_keluar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Volume Barang (Sisa)</label>
                                <input type="text" name="volumeBarang_sisa" placeholder="Volume Barang (Sisa)"
                                    class="form-control @error('volumeBarang_sisa') is-invalid @enderror"
                                    value="{{ old('volumeBarang_sisa') }}">
                                @error('volumeBarang_sisa')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Harga Satuan</label>
                                <input type="text" name="harga_satuan" placeholder="Harga Satuan"
                                    class="form-control @error('harga_satuan') is-invalid @enderror"
                                    value="{{ old('harga_satuan') }}">
                                @error('harga_satuan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
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
                                <label for="image" class="form-label">Masukan Image</label>
                                <img class="img-preview img-fluid d-block">
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    id="image" name="image" onchange="previewImage()">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="{{ route('inventaris.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'blok';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            };
        }
    </script>
@endsection
