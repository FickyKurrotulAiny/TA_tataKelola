@extends('layouts.master')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h3>
                            Detail Peminjaman</h3>
                    </div>
                    <div class="card">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="@if (Auth::user()->level === 'admin') col-md-6 @else col-md-12 @endif">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <tr>
                                            <th width="210px">Tanggal Pinjam</th>
                                            <th width="30px">:</th>
                                            <th>{{ Carbon\Carbon::parse($peminjaman->tanggal)->format('d-m-Y') }}</th>
                                        </tr>
                                        <tr>
                                            <th width="200px">Tanggal Kembali</th>
                                            <th width="30px">:</th>
                                            <th>{{ Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d-m-Y') }}
                                            </th>
                                        </tr>
                                        <tr>
                                            <th width="200px">Nama Dosen Peminjam</th>
                                            <th width="30px">:</th>
                                            <th>{{ $peminjaman->nama_peminjam }}</th>
                                        </tr>
                                        <tr>
                                            <th width="200px">Kelas </th>
                                            <th width="30px">:</th>
                                            <th>{{ $peminjaman->kelas }}</th>
                                        </tr>
                                        <tr>
                                            <th width="200px">Jurusan</th>
                                            <th width="30px">:</th>
                                            <th>{{ $peminjaman->jurusan }}</th>
                                        </tr>
                                        <tr>
                                            <th width="200px">Program Studi</th>
                                            <th width="30px">:</th>
                                            <th>{{ $peminjaman->program_studi }}</th>
                                        </tr>
                                        <tr>
                                            <th width="200px">Nama Kegiatan</th>
                                            <th width="30px">:</th>
                                            <th>{{ $peminjaman->nama_kegiatan }}</th>
                                        </tr>
                                        <tr>
                                            <th width="200px">Keterangan</th>
                                            <th width="30px">:</th>
                                            <th>{!! $peminjaman->keterangan !!}</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            @if (Auth::user()->level === 'admin')
                                <div class="col-6">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-md">
                                            <tr>
                                                <th width="200px">Petugas Yang Menyerahkan</th>
                                                <th width="30px">:</th>
                                                <th>{{ $peminjaman->petugas }}</th>
                                            </tr>
                                            <tr>
                                                <th width="200px">Yang Mengambil</th>
                                                <th width="30px">:</th>
                                                <th>{{ $peminjaman->mengambil }}</th>
                                            </tr>
                                            <tr>
                                                <th width="200px">Yang Mengembalikan</th>
                                                <th width="30px">:</th>
                                                <th>{{ $peminjaman->mengembalikan }}</th>
                                            </tr>
                                            <tr>
                                                <th width="200px">Petugas Yang Menerima</th>
                                                <th width="30px">:</th>
                                                <th>{{ $peminjaman->menerima }}</th>
                                            </tr>
                                            <tr>
                                                <th width="200px">Keadaaan Barang</th>
                                                <th width="30px">:</th>
                                                <th>{{ $peminjaman->keadaan_barang }}</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            @endif
                            <table class="table table-bordered table-md">
                                <thead>
                                    <th>No.</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Merk</th>
                                    <th>Tahun Peroleh</th>
                                    <th>Jumlah</th>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($peminjaman->details as $details)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $details->barang->kode_barang }}</td>
                                            <td>{{ $details->barang->nama_barang }}</td>
                                            <td>{{ $details->barang->merk }}</td>
                                            <td>{{ $details->barang->tahun_peroleh }}</td>
                                            <td>{{ $details->jumlah }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br><br>
                        </div>
                        <br>
                        <tr>
                            <th><a href="{{ route('peminjaman.index') }}" class="btn btn-primary">Kembali</a></th>
                            @if (Auth::user()->level !== 'admin')
                                <th><a href="{{url('/generatePDFPinjam/'.$peminjaman->id)}}" target="_blank"
                                    class="btn btn-primary">Cetak Form</a></th>
                            @endif
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
