@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar Laporan</h1>
        </div>
        <div class="section-body">
            <div class="col-12 col-md-12 col-lg-12">
                <div style="width: 100%;">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jenis Laporan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <select class="form-control" name="bulan">
                                            <option value="">-- Pilih Bulan --</option>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="tahun">
                                            <option value="">-- Pilih Tahun --</option>
                                            <option value="2025">2025</option>
                                            <option value="2024">2024</option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                            <option value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                            <option value="2014">2014</option>
                                            <option value="2013">2013</option>
                                            <option value="2012">2012</option>
                                            <option value="2011">2011</option>
                                            <option value="2010">2010</option>
                                            <option value="2009">2009</option>
                                            <option value="2008">2008</option>
                                            <option value="2007">2007</option>
                                        </select>
                                    </div>
                                    <form method="get" action="{{ route('opsi') }}">
                                        @csrf
                                        <div class="form-group">
                                            <select class="form-control" name="opsi">
                                                <option value="">-- Pilih Jenis Laporan</option>
                                                <option value="Barang Inventaris">Barang Inventaris</option>
                                                <option value="Barang Persediaan">Barang Persediaan</option>
                                                <option value="Peminjaman">Peminjaman</option>
                                                <option value="Permintaan">permintaan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <button class="btn btn-primary">Cetak
                                            </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Batal</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
