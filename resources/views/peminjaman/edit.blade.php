@extends('layouts.master')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h3>
                            Edit Peminjaman</h3>
                    </div>
                    <div class="card">
                    </div>
                    <div class="card-body">
                        <form class="main-form row" action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">tanggal</label>
                                <input required type="date" name="tanggal" readonly placeholder="tanggal"
                                    class="form-control"value="{{ old('tanggal', $peminjaman->tanggal) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nama Dosen Peminjam</label>
                                <input required type="text" name="nama_peminjam" placeholder="Nama Dosen Peminjam"
                                    class="form-control"value="{{ old('nama_peminjam', $peminjaman->nama_peminjam) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Kelas</label>
                                <input required type="text" name="kelas" placeholder="Kelas"
                                    class="form-control"value="{{ old('kelas', $peminjaman->kelas) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Jurusan</label>
                                <input required type="text" name="jurusan" placeholder="Jurusan"
                                    class="form-control"value="{{ old('jurusan', $peminjaman->jurusan) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Program Studi</label>
                                <input required type="text" name="program_studi" placeholder="Program Studi"
                                    class="form-control"value="{{ old('program_studi', $peminjaman->program_studi) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nama Kegiatan</label>
                                <input required type="text" name="nama_kegiatan" placeholder="Nama Kegiatan</label>"
                                    class="form-control"value="{{ old('nama_kegiatan', $peminjaman->nama_kegiatan) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Petugas Yang Menyerahkan</label>
                                <input required type="text" name="petugas" placeholder="Petugas Yang Menyerahkan"
                                    class="form-control"value="{{ old('petugas', $peminjaman->petugas) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Yang Mengambil</label>
                                <input required type="text" name="mengambil" placeholder="Yang Mengambil"
                                    class="form-control"value="{{ old('mengambil', $peminjaman->mengambil) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Tanggal Kembali</label>
                                <input required type="date" name="tanggal_kembali" placeholder="Tanggal Kembali"
                                    class="form-control"value="{{ old('tanggal_kembali', $peminjaman->tanggal_kembali) }}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-12">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea required name="keterangan" class="form-control">{{ $peminjaman->keterangan }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Pilih Barang</label>
                                <select class="js-select2-barang form-control" name="state">
                                    <option value="" disabled selected>Silahkan pilih barang yang ingin di pinjam
                                    </option>
                                    @foreach ($barangs as $barang)
                                        <option value="{{ $barang->kode_barang }}"
                                            data-json="{{ base64_encode(json_encode($barang)) }}">
                                            {{ $barang->nama_barang }} -
                                            {{ $barang->kode_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mt-3 mb-3">
                                <table class="table order-list" id="table-list">
                                    <thead>
                                        <tr>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Tahun Peroleh</th>
                                            <th>Jumlah Barang</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($peminjaman->details as $details)
                                            <tr>
                                                <td>{{ $details->barang->kode_barang }}</td>
                                                <td>{{ $details->barang->nama_barang }}</td>
                                                <td>{{ $details->barang->tahun_peroleh }}</td>
                                                <td>
                                                    <input type="number" class="form-control qty" name="qty[]"
                                                        value="{{ $details->jumlah }}" step="any" required />
                                                </td>
                                                <td>
                                                    <button type="button" class="ibtnDel btn btn-md btn-danger">
                                                        Hapus
                                                    </button>
                                                    <input type="hidden" class="kode-barang" name="kode_barang[]"
                                                        value="{{ $details->barang->kode_barang }}" />
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.js-select2-barang').select2();
        });
        $('.js-select2-barang').on('change', function() {
            var selectedOption = $(this).find('option:selected');
            var value = selectedOption.val();
            var jsonData = selectedOption.data('json');
            var decodedData = JSON.parse(atob(jsonData));
            var pre_qty = 0;

            $(".kode-barang").each(function(i) {
                if ($(this).val() == value) {
                    rowindex = i;
                    pre_qty = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val();
                }
            })

            var flag = 1;
            if (pre_qty > 0) {
                var qty = parseInt(pre_qty) + 1;
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val(qty);
                flag = 0;
            }
            if (flag) {
                var newRow = $("<tr>");
                var cols = '';

                cols += '<td>' + decodedData.kode_barang + '</td>';
                cols += '<td>' + decodedData.nama_barang + '</td>';
                cols += '<td>' + decodedData.tahun_peroleh + '</td>';
                cols +=
                    '<td><input type="number" class="form-control qty" name="qty[]" value="1" step="any" required/></td>';
                cols +=
                    '<td><button type="button" class="ibtnDel btn btn-md btn-danger">Hapus</button></td>';
                cols += '<input type="hidden" class="kode-barang" name="kode_barang[]" value="' + decodedData
                    .kode_barang + '"/>';

                newRow.append(cols);
                $("table.order-list tbody").prepend(newRow);
            }
        });

        $("table.order-list tbody").on("click", ".ibtnDel", function(event) {
            rowindex = $(this).closest('tr').index();
            $(this).closest("tr").remove();
        });
    </script>
@endpush

