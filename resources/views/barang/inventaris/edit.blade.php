@extends('layouts.master')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h3>
                            Edit Inventaris</h3>
                    </div>
                    <div class="card">
                    </div>
                    <div class="card-body">
                        <form class="main-form row" action="{{ route('inventaris.update', $inventaris->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Kode Barang</label>
                                <input type="text" name="kode_barang" placeholder="Kode Barang"
                                    class="form-control"value="{{ old('kode_barang', $inventaris->kode_barang) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nama Barang</label>
                                <input type="text" name="nama_barang" placeholder="Nama Barang"
                                    class="form-control"value="{{ old('nama_barang', $inventaris->nama_barang) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Satuan Barang</label>
                                <input type="text" name="satuan" placeholder="Satuan Barang"
                                    class="form-control"value="{{ old('satuan', $inventaris->satuan) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Tahun Peroleh</label>
                                <input type="text" name="tahun_peroleh" placeholder="Tahun Peroleh"
                                    class="form-control"value="{{ old('tahun_peroleh', $inventaris->tahun_peroleh) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Sumber Anggaran</label>
                                <input type="text" name="sumber_anggaran" placeholder="Sumber Anggaran"
                                    class="form-control"value="{{ old('sumber_anggaran', $inventaris->sumber_anggaran) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">NUP</label>
                                <input type="text" name="NUP" placeholder="NUP"
                                    class="form-control"value="{{ old('NUP', $inventaris->NUP) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Merk/Type</label>
                                <input type="text" name="merk" placeholder="Merk/Type"
                                    class="form-control"value="{{ old('merk', $inventaris->merk) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Jumlah Barang</label>
                                <input type="text" name="jumlah" placeholder="Jumlah Barang" class="form-control"
                                    value="{{ old('jumlah', $inventaris->jumlah) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nilai Barang</label>
                                <input type="text" name="nilai_barang" placeholder="Nilai Barang" class="form-control"
                                    value="{{ old('nilai_barang', $inventaris->nilai_barang) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Kondisi (B)</label>
                                <input type="text" name="kondisi_baru" placeholder="Kondisi (B)" class="form-control"
                                    value="{{ old('kondisi_baru', $inventaris->kondisi_baru) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Kondisi (RR)</label>
                                <input type="text" name="kondisi_rusakRingan" placeholder="Kondisi (RR)"
                                    class="form-control"
                                    value="{{ old('kondisi_rusakRingan', $inventaris->kondisi_rusakRingan) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Kondidsi (RB)</label>
                                <input type="text" name="kondisi_rusakBerat" placeholder="Kondidsi (RB)"
                                    class="form-control"
                                    value="{{ old('kondisi_rusakBerat', $inventaris->kondisi_rusakBerat) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Kondisi (Hilang)</label>
                                <input type="text" name="kondisi_hilang" placeholder="Kondisi (Hilang)"
                                    class="form-control"
                                    value="{{ old('kondisi_hilang', $inventaris->kondisi_hilang) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Pelebelan (S)</label>
                                <input type="text" name="pelebelan_sudah" placeholder="Pelebelan (S)"
                                    class="form-control"
                                    value="{{ old('pelebelan_sudah', $inventaris->pelebelan_sudah) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Pelebelan (B)</label>
                                <input type="text" name="pelebelan_belum" placeholder="Pelebelan (B)"
                                    class="form-control"
                                    value="{{ old('pelebelan_belum', $inventaris->pelebelan_belum) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nama Pengguna (Unit)</label>
                                <input type="text" name="namapengguna_unit" placeholder="Nama Pengguna (Unit)"
                                    class="form-control"
                                    value="{{ old('namapengguna_unit', $inventaris->namapengguna_unit) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nama Pengguna (Individu)</label>
                                <input type="text" name="namapengguna_individu" placeholder="Nama Pengguna (Individu)"
                                    class="form-control"
                                    value="{{ old('namapengguna_individu', $inventaris->namapengguna_individu) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nama Gedung</label>
                                <input type="text" name="nama_gedung" placeholder="Nama Gedung" class="form-control"
                                    value="{{ old('nama_gedung', $inventaris->nama_gedung) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nama Ruangan</label>
                                <input type="text" name="nama_ruangan" placeholder="Nama Ruangan"
                                    class="form-control" value="{{ old('nama_ruangan', $inventaris->nama_ruangan) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nama Tempat</label>
                                <input type="text" name="tempat" placeholder="Nama Tempat" class="form-control"
                                    value="{{ old('tempat', $inventaris->tempat) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" placeholder="Keterangan" class="form-control"
                                    value="{{ old('keterangan', $inventaris->keterangan) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="image" class="form-label">Masukan Image</label>
                                @if ($inventaris->image)
                                    <img src="{{ asset('imageinventaris/' . $inventaris->image) }}"
                                        class="img-preview img-fluid d-block">
                                @else
                                    <img class="img-preview img-fluid">
                                @endif
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    id="image" name="image" onchange="previewImage()">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
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
