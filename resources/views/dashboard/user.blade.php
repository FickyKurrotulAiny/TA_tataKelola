@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <h1>INFORMASI DATA BARANG INVENTARIS YANG TERSEDIA</h1>
                    </div>
                    <div class="col-md-4">
                        <form action="{{ route('dashboard') }}" method="get">
                            @method('get')
                            <div class="input-group">
                                <input value="{{ $search }}" type="text" class="form-control" placeholder="Search" name="search" id="search">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-body">
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
                                    <center>
                                    <img src="{{ url('imageinventaris/' . $invent->image) }}" width="200px" title="" height="200px">
                                    </center>
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
                @if (count($inventaris) < 1 && $search !== '')
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <center>
                                    <h4>Barang Tidak Tersedia</h4>
                                    <br>
                                    <a href="{{ route('dashboard') }}" class="btn btn-info">
                                        Kembali
                                    </a>
                                </center>
                            </div>
                        </div>
                    </div>
                @endif
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
            cols += '<td>' + details.kondisi_baru + '</td>';

            newRow.append(cols);
            $("#modal-details table tbody").prepend(newRow);
        })
    </script>
@endpush
