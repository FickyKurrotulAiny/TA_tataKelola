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
