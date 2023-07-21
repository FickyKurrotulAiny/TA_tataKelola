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
                                    <th width="200px">Keterangan</th>
                                    <th width="30px">:</th>
                                    <th>{{ $permintaan->keterangan }}</th>
                                </tr>
                                @if (Auth::user()->level === 'admin')
                                    <tr>
                                        <th width="200px">Yang mengambil </th>
                                        <th width="30px">:</th>
                                        <th>{{ $permintaan->mengambil }}</th>
                                    </tr>
                                    <tr>
                                        <th width="200px">Petugas Yang Memberikan</th>
                                        <th width="30px">:</th>
                                        <th>{{ $permintaan->petugas }}</th>
                                    </tr>
                                @endif
                            </table>
                            <table class="table table-bordered table-md">
                                <thead>
                                    <th>No.</th>
                                    <th>Nama Barang</th>
                                    <th>Merk</th>
                                    <th>Satuan</th>
                                    <th>Jumlah</th>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($permintaan->details as $details)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $details->barang->nama_barang }}</td>
                                            <td>{{ $details->barang->merk }}</td>
                                            <td>{{ $details->barang->satuan }}</td>
                                            <td>{{ $details->jumlah }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <tr>
                                <th><a href="{{ route('permintaan.index') }}" class="btn btn-primary">Kembali</a></th>
                                @if (Auth::user()->level !== 'admin')
                                <th><a href="{{url('/generatePDFPermintaan/'.$permintaan->id)}}" target="_blank"
                                    class="btn btn-primary">Cetak Form</a></th>
                                @endif
                            </tr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
