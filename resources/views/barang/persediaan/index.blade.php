@extends('layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Daftar Persediaan</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <a href="{{route('persediaan.create')}}" class="btn btn-primary"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;&nbsp;Tambah</a>
                    </div>
                    <div class="card-body">
                        <!-- <div class="table-responsive"> -->
                            <table class="table table-bordered table-md" id="persediaan">
                                <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>Nama Barang</th>
                                        <th>Merk/Type</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.slim.js"
    integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection

@push('scripts')

<script>
    $(document).ready(function () {

        $('#persediaan').DataTable({
            processing: true,
            serverside: true,
            // responsive: true,
            ajax: {
                url: "{{route('getPersediaan')}}"
            },

            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama_barang',
                    name: 'nama_barang'
                },
                {
                    data: 'merk',
                    name: 'merk'
                },
                {
                    data: 'jumlah',
                    name: 'jumlah'
                },
                {
                    data: 'satuan',
                    name: 'satuan'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        })
    });

    function deletePersediaan(id){
        swal({
                title: "Yakin ?",
                text: "Anda akan menghapusnya persediaan",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/persediaan/" +id,
                        method: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        success: function (res) {
                            toastr.success('Persediaan berhasil dihapus', 'Berhasil')
                            table.draw()
                        },
                        error: function (err) {
                            toastr.error(
                                'Terjadi kesalahan saat menghapus persediaan',
                                'Perhatian')
                        }
                    })

                    swal("Persediaan berhasil dihapus", {
                        icon: "success",
                    }).then(() => window.location.reload());
                } else {
                    swal("Persediaan tidak jadi dihapus");
                }
            });
    }

    @if(session('success'))
        swal({
            icon: 'success',
            title: `{{ session('success') }}`
        })
        @endif

        @if(session('error'))
        swal({
            icon: 'error',
            title: `{{ session('error') }}`,
            text: `{{ request()->session()->has('error_message')? session('error_message'): null }}`
        })
        @endif

</script>

@endpush
