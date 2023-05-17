@extends('layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Detail Persediaan</h1>
    </div>
    <div class="section-body">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th width="220px">Nama Barang</th>
                        <th width="30px">:</th>
                        <th>{{ $persediaan->nama_barang}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Merk/Type</th>
                        <th width="30px">:</th>
                        <th>{{ $persediaan->merk}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Satuan</th>
                        <th width="30px">:</th>
                        <th>{{ $persediaan->satuan}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Volume Barang (Saldo Awal)</th>
                        <th width="30px">:</th>
                        <th>{{ $persediaan->volumeBarang_saldo}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Volume Barang (Masuk)</th>
                        <th width="30px">:</th>
                        <th>{{ $persediaan->volumeBarang_masuk}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Volume Barang (Keluar)</th>
                        <th width="30px">:</th>
                        <th>{{ $persediaan->volumeBarang_keluar}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Volume Barang (Sisa)</th>
                        <th width="30px">:</th>
                        <th>{{ $persediaan->volumeBarang_sisa}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Satuan</th>
                        <th width="30px">:</th>
                        <th>{{ $persediaan->satuan}}</th>
                    </tr>
                    <tr>
                        <th width="200px">Jumlah Barang</th>
                        <th width="30px">:</th>
                        <th>{{ $persediaan->jumlah}}</th>
                    </tr>
                </table>
                <br>
                <tr>
                    <th><a href="{{ route('persediaan.index') }}" class="btn btn-primary">Kembali</a></th>
                </tr>
            </div>
        </div>
    </div>
</section>
@endsection
