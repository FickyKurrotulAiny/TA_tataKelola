@extends('layouts.master')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h3>
                            Detail Persediaan</h3>
                    </div>
                    <div class="card">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" >
                            <table class="table table-bordered table-md">
                                <tr>
                                    <th width="220px">Nama Bahan</th>
                                    <th width="30px">:</th>
                                    <th>{{ $persediaan->nama_barang }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Merk/Type</th>
                                    <th width="30px">:</th>
                                    <th>{{ $persediaan->merk }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Satuan</th>
                                    <th width="30px">:</th>
                                    <th>{{ $persediaan->satuan }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Jumlah Barang</th>
                                    <th width="30px">:</th>
                                    <th>{{ $persediaan->jumlah_barang}}</th>
                                </tr>
                                <tr>
                                    <th width="230px">Tahun Peroleh</th>
                                    <th width="30px">:</th>
                                    <th>{{ $persediaan->tahun_peroleh }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Volume Barang (Saldo Awal)</th>
                                    <th width="30px">:</th>
                                    <th>{{ $persediaan->volumeBarang_saldo }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Volume Barang (Masuk)</th>
                                    <th width="30px">:</th>
                                    <th>{{ $persediaan->volumeBarang_masuk }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Volume Barang (Keluar)</th>
                                    <th width="30px">:</th>
                                    <th>{{ $persediaan->volumeBarang_keluar }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Volume Barang (Sisa)</th>
                                    <th width="30px">:</th>
                                    <th>{{ $persediaan->volumeBarang_sisa }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Harga Satuan</th>
                                    <th width="30px">:</th>
                                    <th>{{ $persediaan->harga_satuan }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Jumlah</th>
                                    <th width="30px">:</th>
                                    <th>{{ $persediaan->jumlah }}</th>
                                </tr>
                                <tr>
                                    <th width="230px">Foto Barang</th>
                                    <th width="30px">:</th>
                                    <th><img src="{{ url('imagepersediaan/' . $persediaan->image) }}" width="150px"></th>
                                </tr>
                            </table>
                            <br>
                            <tr>
                                <th><a href="{{ route('persediaan.index') }}" class="btn btn-primary">Kembali</a></th>
                            </tr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
