<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->integer('kode_barang')->unique();
            $table->string('nama_barang')->unique();
            $table->string('jumlah_barang');
            $table->string('nama_peminjam');
            $table->string('jurusan');
            $table->string('mengambil');
            $table->string('petugas');
            $table->date('tanggal_kembali');
            $table->string('nama_kegiatan');
            $table->string('kelas');
            $table->string('program_studi');
            $table->string('keterangan');
            $table->softDeletes();
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
        Schema::dropIfExists('peminjaman');
    }
}
