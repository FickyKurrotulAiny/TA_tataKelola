<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjam', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dosen');
            $table->string('jurusan');
            $table->string('program_studi');
            $table->string('nama_kegiatan');
            $table->string('tanggal');
            $table->string('tanggal_kembali');
            $table->string('nama_barang');
            $table->string('tahun_peroleh');
            $table->string('jumlah');
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
        Schema::dropIfExists('pinjam');
    }
}
