@extends('layouts.master')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h3>
                            Detail Inventaris</h3>
                    </div>
                    <div class="card">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <tr>
                                            <th width="230px">Kode Barang</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->kode_barang }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">Nama Barang</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->nama_barang }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">Satuan</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->satuan }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">Tahun Peroleh</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->tahun_peroleh }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">Sumber Anggaran</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->sumber_anggaran }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">NUP</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->NUP }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">Merk/Type</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->merk }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">Jumlah Barang</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->jumlah }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">Nilai Barang</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->nilai_barang }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">Kondisi (B)</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->kondisi_baru }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">Kondisi (RR)</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->kondisi_rusakRingan }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">Kondisi (RB)</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->kondisi_rusakBerat }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">Kondisi (Hilang)</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->kondisi_hilang }}</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <tr>
                                            <th width="230px">Pelebelan (S)</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->pelebelan_sudah }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">Pelebelan (B)</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->pelebelan_belum }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">Nama Pengguna (Unit)</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->namapengguna_unit }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">Nama Pengguna (Individu)</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->namapengguna_individu }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">Nama Gedung</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->nama_gedung }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">Nama Ruangan</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->nama_ruangan }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">Nama Ruangan</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->tempat }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">Keterangan</th>
                                            <th width="30px">:</th>
                                            <th>{{ $inventaris->keterangan }}</th>
                                        </tr>
                                        <tr>
                                            <th width="230px">Foto Barang</th>
                                            <th width="30px">:</th>
                                            <th><img src="{{ url('imageinventaris/' . $inventaris->image) }}"
                                                    width="150px"></th>
                                        </tr>
                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('inventaris.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
