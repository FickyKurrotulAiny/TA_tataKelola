@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="row">
                <div class="col">
                    <h1>INFORMASI DATA BARANG YANG TERSEDIA</h1>
                    <form class="form-inline mr-auto">
                        <ul class="navbar-nav mr-3">
                            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                        class="fas fa-search"></i></a></li>
                        </ul>
                        <div class="search-element float-right">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                data-width="250">
                            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            <div class="search-backdrop"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Data Barang Inventaris (Peminjaman)</h2>
            <div class="row">
                @foreach ($inventaris as $invent)
                    <div class="col-12 col-sm-6 col-md-10 col-lg-3">
                        <article class="article article-style-b">
                            <div class="article-details">
                                <div class="article-title">
                                    <h2>
                                        <a href="javascript:void(0)">
                                            {{ $invent->nama_barang }} - {{ $invent->merk }}
                                            ({{ $invent->tahun_peroleh }})
                                        </a>
                                    </h2>
                                    <img src="{{ url('imageinventaris/' . $invent->image) }}" width="200px" title="">
                                </div>
                                <div class="article-cta d-flex" style="justify-content: center">
                                    <button class="btn btn-primary btn-details"
                                        data-title="{{ $invent->nama_barang }} - {{ $invent->merk }} ({{ $invent->tahun_peroleh }})"
                                        data-details={{ base64_encode(json_encode($invent, true)) }}>
                                        Details
                                    </button>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            <h2 class="section-title">Data Persediaan Barang (Permintaan)</h2>
            <div class="row">
                @foreach ($persediaans as $persediaan)
                    <div class="col-12 col-sm-6 col-md-10 col-lg-3">
                        <article class="article article-style-b">
                            <div class="article-details">
                                <div class="article-title">
                                    <h2>
                                        <a href="javascript:void(0)">
                                            {{ $persediaan->nama_barang }} - {{ $persediaan->merk }}
                                            ({{ $persediaan->satuan }})
                                        </a>
                                    </h2>
                                    <img src="{{ url('imagepersediaan/' . $persediaan->image) }}" width="200px"
                                        title="">
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            {{-- <div class="card">
                <div class="card-header">
                    <h4>Data Persediaan Barang (Permintaan)</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="data-barang">
                            <thead>
                                <tr>
                                    <th width="20px">No.</th>
                                    <th>Nama Barang</th>
                                    <th>Merk Barang</th>
                                    <th>Satuan Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($persediaans as $persediaan)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $persediaan->nama_barang }}</td>
                                        <td>{{ $persediaan->merk }}</td>
                                        <td>{{ $persediaan->satuan }}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-details" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal Title</h5> <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).on('click', '.btn-details', function() {
            const details = JSON.parse(atob($(this).data('details')))

            $('#modal-details').modal('show')
            $('#modal-details .modal-title').text($(this).data('title'))
            $("#modal-details table tbody").html('')

            var newRow = $("<tr>");
            var cols = '';

            cols += '<td width="45%">Stock</td>';
            cols += '<td>:</td>';
            cols += '<td>' + details.kondisi_baru + '</td>';

            newRow.append(cols);
            $("#modal-details table tbody").prepend(newRow);
        })
    </script>
@endpush
