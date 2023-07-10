@extends('layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Daftar Permintaan</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <a href="{{route('permintaan.create')}}" class="btn btn-primary"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;&nbsp;Tambah</a>
                    </div>
                    <div class="card-body">
                        {{-- <!-- <div class="table-responsive"> --> --}}
                            <table class="table table-bordered table-md" id="permintaan">
                                <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>Tanggal</th>
                                        <th>Nama Dosen</th>
                                        <th>Mata Kuliah</th>
                                        <th>Kelas</th>
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

        $('#permintaan').DataTable({
            processing: true,
            serverside: true,
            // responsive: true,
            ajax: {
                url: "{{route('getPermintaan')}}"
            },

            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'tanggal',
                    name: 'tanggal'
                },
                {
                    data: 'nama_dosen',
                    name: 'nama_dosen'
                },
                {
                    data: 'mata_kuliah',
                    name: 'mata_kuliah'
                },
                {
                    data: 'kelas',
                    name: 'kelas'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        })
    });

    function deletePermintaan(id){
        swal({
                title: "Yakin ?",
                text: "Anda akan menghapusnya permintaan",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/permintaan/" +id,
                        method: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        success: function (res) {
                            toastr.success('Permintaan berhasil dihapus', 'Berhasil')
                            table.draw()
                        },
                        error: function (err) {
                            toastr.error(
                                'Terjadi kesalahan saat menghapus permintaan',
                                'Perhatian')
                        }
                    })

                    swal("Permintaan berhasil dihapus", {
                        icon: "success",
                    }).then(() => window.location.reload());
                } else {
                    swal("Permintaan tidak jadi dihapus");
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
