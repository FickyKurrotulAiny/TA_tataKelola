@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>INFORMASI DATA BARANG YANG TERSEDIA</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Data Barang Inventaris (Barang yang dikembalikan)</h2>
            <div class="row">
                @foreach ($inventaris as $invent)
                    <div class="col-12 col-sm-6 col-md-10 col-lg-4">
                        <article class="article article-style-b">
                            <div class="article-details">
                                <div class="article-title">
                                    <h2>
                                        <a href="javascript:void(0)">
                                            {{ $invent->nama_barang }} - {{ $invent->merk }} ({{ $invent->tahun_peroleh }})
                                        </a>
                                    </h2>
                                    <img src="{{ url('imageinventaris/' . $invent->image) }}" width="200px">
                                </div>
                                <br>
                                <ul style="padding-left: 30px">
                                    <li>Stock : {{ $invent->jumlah }} {{ $invent->satuan }}</li>
                                    <li>Gedung : {{ $invent->nama_gedung }}</li>
                                    <li>Ruangan : {{ $invent->nama_ruangan }}</li>
                                    <li>Tempat : {{ $invent->tempat }}</li>

                                </ul>
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
            <div class="card">
                <div class="card-header">
                    <h4>Data Persediaan Barang (Habis Pakai)</h4>
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
            </div>
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
            cols += '<td>' + details.jumlah + '</td>';

            newRow.append(cols);
            $("#modal-details table tbody").prepend(newRow);
        })
    </script>
@endpush
