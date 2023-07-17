@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="row">
                <div class="col-md-12">
                    <h1>INFORMASI DATA BARANG PERSEDIAAN YANG TERSEDIA</h1>
                </div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                @foreach ($persediaans as $persediaan)
                    <div class="col-12 col-sm-6 col-md-10 col-lg-3">
                        <article class="article article-style-b">
                            <div class="article-details">
                                <div class="article-title">
                                    <h2>
                                        <a href="javascript:void(0)">
                                            {{ $persediaan->nama_barang }} - {{ $persediaan->merk }}
                                            ({{ $persediaan->tahun_peroleh }})
                                        </a>
                                    </h2>
                                    <center>
                                        <img src="{{ url('imagepersediaan/' . $persediaan->image) }}" width="200px"
                                            height="200px" title="">
                                    </center>
                                </div>
                                <div class="article-cta d-flex" style="justify-content: center">
                                    <button class="btn btn-primary btn-details"
                                        data-title="{{ $persediaan->nama_barang }} - {{ $persediaan->merk }} ({{ $persediaan->tahun_peroleh }})"
                                        data-details={{ base64_encode(json_encode($persediaan, true)) }}>
                                        Details
                                    </button>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
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
            cols += '<td>' + details.jumlah_barang + '</td>';

            newRow.append(cols);
            $("#modal-details table tbody").prepend(newRow);
        })
    </script>
@endpush
