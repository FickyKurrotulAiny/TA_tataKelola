@extends('layouts.master')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h3>
                            Detail Permintaan</h3>
                    </div>
                    <div class="card">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tr>
                                    <th width="210px">Tanggal</th>
                                    <th width="30px">:</th>
                                    <th>{{ Carbon\Carbon::parse($permintaan->tanggal)->format('d-m-Y') }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Nama Bahan</th>
                                    <th width="30px">:</th>
                                    <th>{{ $permintaan->nama_bahan }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Jumlah</th>
                                    <th width="30px">:</th>
                                    <th>{{ $permintaan->jumlah }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Nama Dosen </th>
                                    <th width="30px">:</th>
                                    <th>{{ $permintaan->nama_dosen }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Mata Kuliah </th>
                                    <th width="30px">:</th>
                                    <th>{{ $permintaan->mata_kuliah }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Kelas </th>
                                    <th width="30px">:</th>
                                    <th>{{ $permintaan->kelas }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Satuan </th>
                                    <th width="30px">:</th>
                                    <th>{{ $permintaan->satuan }}</th>
                                </tr>
                                <tr>
                                    <th width="200px">Keterangan</th>
                                    <th width="30px">:</th>
                                    <th>{{ $permintaan->keterangan }}</th>
                                </tr>
                            </table>
                            <br>
                            <tr>
                                <th><a href="{{ route('permintaan.index') }}" class="btn btn-primary">Kembali</a></th>
                                <th><a href="{{url('/generatePDFPermintaan/'.$permintaan->id)}}" target="_blank"
                                            class="btn btn-primary">Cetak Form</a></th>
                            </tr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
