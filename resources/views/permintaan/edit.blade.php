@extends('layouts.master')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h3>
                            Edit Permintaan</h3>
                    </div>
                    <div class="card">
                    </div>
                    <div class="card-body">
                        <form class="main-form" action="{{ route('permintaan.update', $permintaan->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label class="form-label">
                                        Tanggal Pinjam
                                    </label>
                                    <input type="text" name="tanggal" class="form-control" readonly
                                        value="{{ $permintaan->tanggal }}" placeholder="Choose date" />
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Nama Dosen</label>
                                    <input type="text" name="nama_dosen" placeholder="Nama Dosen"
                                        class="form-control @error('nama_dosen') is-invalid @enderror"
                                        value="{{ $permintaan->nama_dosen }}">
                                    @error('nama_dosen')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Mata Kuliah</label>
                                    <input type="text" name="mata_kuliah" placeholder="Mata Kuliah"
                                        class="form-control @error('mata_kuliah') is-invalid @enderror"
                                        value="{{ $permintaan->mata_kuliah }}">
                                    @error('mata_kuliah')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Kelas</label>
                                    <input type="text" name="kelas" placeholder="Kelas"
                                        class="form-control @error('kelas') is-invalid @enderror" value="{{ $permintaan->kelas }}">
                                    @error('kelas')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan" placeholder="Keterangan"
                                        class="form-control @error('keterangan') is-invalid @enderror"
                                        value="{{ $permintaan->keterangan }}">
                                    @error('keterangan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Pilih Barang</label>
                                    <select class="js-select2-barang form-control" name="state">
                                        <option value="" disabled selected>Silahkan pilih barang yang ingin di minta
                                        </option>
                                        @foreach ($barangs as $barang)
                                            <option value="{{ $barang->id }}"
                                                data-json="{{ base64_encode(json_encode($barang)) }}">
                                                {{ $barang->nama_barang }} -
                                                {{ $barang->merk }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12 mt-3 mb-3">
                                    <table class="table order-list" id="table-list">
                                        <thead>
                                            <tr>
                                                <th>Nama Barang</th>
                                                <th>Satuan</th>
                                                <th>Merk</th>
                                                <th>Jumlah Barang</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($permintaan->details as $details)
                                                <tr>
                                                    <td>{{ $details->barang->nama_barang }}</td>
                                                    <td>{{ $details->barang->satuan }}</td>
                                                    <td>{{ $details->barang->merk }}</td>
                                                    <td>
                                                        <input type="number" class="form-control qty" name="qty[]"
                                                            value="{{ $details->jumlah }}" step="any" required />
                                                    </td>
                                                    <td>
                                                        <button type="button" class="ibtnDel btn btn-md btn-danger">
                                                            Hapus
                                                        </button>
                                                        <input type="hidden" class="id-barang" name="id_barang[]"
                                                            value="{{ $details->barang->id }}" />
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('permintaan.index') }}" class="btn btn-secondary">Batal</a>
                                </div>
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
            console.log(decodedData)
            $(".id-barang").each(function(i) {
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

                cols += '<td>' + decodedData.nama_barang + '</td>';
                cols += '<td>' + decodedData.satuan + '</td>';
                cols += '<td>' + decodedData.merk + '</td>';
                cols +=
                    '<td><input type="number" class="form-control qty" name="qty[]" value="1" step="any" required/></td>';
                cols +=
                    '<td><button type="button" class="ibtnDel btn btn-md btn-danger">Hapus</button></td>';
                cols += '<input type="hidden" class="nama-barang" name="id_bahan[]" value="' + decodedData
                    .id + '"/>';

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
