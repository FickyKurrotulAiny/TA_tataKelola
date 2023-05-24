@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard Admin Pengelolaan BMN TI</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary d-flex justify-content-center align-items-center">
                        <i class="fas fa-dolly-flatbed"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Barang Inventaris</h4>
                        </div>
                        <div class="card-body">
                            {{ $inventaris }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success d-flex justify-content-center align-items-center">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Barang Persediaan</h4>
                        </div>
                        <div class="card-body">
                            {{ $persediaan }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger d-flex justify-content-center align-items-center">
                        <i class="fas fa-sticky-note"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Peminjaman</h4>
                        </div>
                        <div class="card-body">
                            {{ $peminjaman }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning d-flex justify-content-center align-items-center">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>User</h4>
                        </div>
                        <div class="card-body">
                            {{ $user }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
