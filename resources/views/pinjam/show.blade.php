@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card" style="width: 100%;">
                        <div class="card-header">
                            <h3>
                                Detail Peminjaman</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th width="200px">Tanggal</th>
                                        <th width="30px">:</th>
                                        <th>{{ Carbon\Carbon::parse($pinjam->tanggal)->format('d-m-Y') }}</th>
                                    </tr>
                                    <tr>
                                        <th width="200px">Keterangan</th>
                                        <th width="30px">:</th>
                                        <th>{{ $pinjam->keterangan }}</th>
                                    </tr>
                                    <tr>
                                        <th width="200px">Rencana Kembali Tanggal</th>
                                        <th width="30px">:</th>
                                        <th>{{ Carbon\Carbon::parse($pinjam->tanggal_kembali)->format('d-m-Y') }}</th>
                                    </tr>
                                    <tr>
                                        <th width="200px">Jurusan</th>
                                        <th width="30px">:</th>
                                        <th>{{ $pinjam->jurusan }}</th>
                                    </tr>
                                    <tr>
                                        <th width="200px">Program Studi</th>
                                        <th width="30px">:</th>
                                        <th>{{ $pinjam->program_studi }}</th>
                                    </tr>
                                    <tr>
                                        <th width="200px">Kelas</th>
                                        <th width="30px">:</th>
                                        <th>{{ $pinjam->kelas }}</th>
                                    </tr>
                                    <tr>
                                        <th width="200px">Nama Kegiatan</th>
                                        <th width="30px">:</th>
                                        <th>{{ $pinjam->nama_kegiatan }}</th>
                                    </tr>
                                    <tr>
                                        <th width="200px">Nama Dosen</th>
                                        <th width="30px">:</th>
                                        <th>{{ $pinjam->nama_dosen }}</th>
                                    </tr>
                                </table>
                                <br>
                                <table class="table table-bordered table-md">
                                    <thead>
                                        <th>No.</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>

                                        <th>Tahun Peroleh</th>
                                        <th>Jumlah</th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($pinjam->details as $details)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $details->barang->kode_barang }}</td>
                                                <td>{{ $details->barang->nama_barang }}</td>
                                                <td>{{ $details->barang->tahun_peroleh }}</td>
                                                <td>{{ $details->jumlah }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br><br>
                                <tr>
                                    <th><a href="{{ route('pinjam.index') }}" class="btn btn-primary">Kembali</a></th>
                                    <th><a href="{{ route('generatePDFPinjam', $pinjam->id) }}" target="_blank"
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
