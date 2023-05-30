@extends('layouts.master')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h3>
                            Tambah Inventaris</h3>
                    </div>
                    <div class="card">
                    </div>
                    <div class="card-body">
                        <form class="main-form row" action="{{ route('inventaris.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- @method('PUT') -->
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
                                <label for="" class="form-label">Sumber Anggaran</label>
                                <input type="text" name="sumber_anggaran" placeholder="Sumber Anggaran"
                                    class="form-control @error('sumber_anggaran') is-invalid @enderror"
                                    value="{{ old('sumber_anggaran') }}">
                                @error('sumber_anggaran')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">NUP</label>
                                <input type="text" name="NUP" placeholder="NUP"
                                    class="form-control @error('NUP') is-invalid @enderror" value="{{ old('NUP') }}">
                                @error('NUP')
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
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Jumlah Barang</label>
                                <input type="text" name="jumlah" placeholder="Jumlah Barang"
                                    class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah') }}">
                                @error('jumlah')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nilai Barang</label>
                                <input type="text" name="nilai_barang" placeholder="Nilai Barang"
                                    class="form-control @error('nilai_barang') is-invalid @enderror"
                                    value="{{ old('nilai_barang') }}">
                                @error('nilai_barang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Kondisi (B)</label>
                                <input type="text" name="kondisi_baru" placeholder="Kondisi (B)"
                                    class="form-control @error('kondisi_baru') is-invalid @enderror"
                                    value="{{ old('kondisi_baru') }}">
                                @error('kondisi_baru')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Kondisi (RR)</label>
                                <input type="text" name="kondisi_rusakRingan" placeholder="Kondisi (RR)"
                                    class="form-control @error('kondisi_rusakRingan') is-invalid @enderror"
                                    value="{{ old('kondisi_rusakRingan') }}">
                                @error('kondisi_rusakRingan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Kondisi (RB)</label>
                                <input type="text" name="kondisi_rusakBerat" placeholder="Kondisi (RB)"
                                    class="form-control @error('kondisi_rusakBerat') is-invalid @enderror"
                                    value="{{ old('kondisi_rusakBerat') }}">
                                @error('kondisi_rusakBerat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Kondisi (Hilang)</label>
                                <input type="text" name="kondisi_hilang" placeholder="Kondisi (Hilang)"
                                    class="form-control @error('kondisi_hilang') is-invalid @enderror"
                                    value="{{ old('kondisi_hilang') }}">
                                @error('kondisi_hilang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Pelebelan (S)</label>
                                <input type="text" name="pelebelan_sudah" placeholder="Pelebelan (S)"
                                    class="form-control @error('pelebelan_sudah') is-invalid @enderror"
                                    value="{{ old('pelebelan_sudah') }}">
                                @error('pelebelan_sudah')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Pelebelan (B)</label>
                                <input type="text" name="pelebelan_belum" placeholder="Pelebelan (B)"
                                    class="form-control @error('pelebelan_belum') is-invalid @enderror"
                                    value="{{ old('pelebelan_belum') }}">
                                @error('pelebelan_belum')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nama Pengguna (Unit)</label>
                                <input type="text" name="namapengguna_unit" placeholder="Nama Pengguna (Unit)"
                                    class="form-control @error('namapengguna_unit') is-invalid @enderror"
                                    value="{{ old('namapengguna_unit') }}">
                                @error('namapengguna_unit')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nama Pengguna (Individu)</label>
                                <input type="text" name="namapengguna_individu" placeholder="Nama Pengguna (Individu)"
                                    class="form-control @error('namapengguna_individu') is-invalid @enderror"
                                    value="{{ old('namapengguna_individu') }}">
                                @error('namapengguna_individu')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nama Gedung</label>
                                <input type="text" name="nama_gedung" placeholder="Nama Gedung"
                                    class="form-control @error('nama_gedung') is-invalid @enderror"
                                    value="{{ old('nama_gedung') }}">
                                @error('nama_gedung')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nama Ruangan</label>
                                <input type="text" name="nama_ruangan" placeholder="Nama Ruangan"
                                    class="form-control @error('nama_ruangan') is-invalid @enderror"
                                    value="{{ old('nama_ruangan') }}">
                                @error('nama_ruangan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nama Tempat</label>
                                <input type="text" name="tempat" placeholder="Nama Tempat"
                                    class="form-control @error('tempat') is-invalid @enderror"
                                    value="{{ old('tempat') }}">
                                @error('tempat')
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
