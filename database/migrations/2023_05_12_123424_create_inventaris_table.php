<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('satuan');
            $table->integer('tahun_peroleh');
            $table->string('sumber_anggaran');
            $table->string('NUP');
            $table->string('merk');
            $table->integer('jumlah');
            $table->string('nilai_barang');
            $table->string('kondisi_baru');
            $table->string('kondisi_rusakRingan');
            $table->string('kondisi_rusakBerat');
            $table->string('kondisi_hilang');
            $table->string('pelebelan_sudah');
            $table->string('pelebelan_belum');
            $table->string('namapengguna_unit');
            $table->string('namapengguna_individu');
            $table->string('nama_gedung');
            $table->string('nama_ruangan');
            $table->string('tempat');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventaris');
    }
}
