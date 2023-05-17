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
            $table->id();
            $table->date('tanggal');
            $table->integer('kode_barang');
            $table->string('nama_barang');
            $table->string('jumlah_barang');
            $table->string('nama_peminjam');
            $table->string('jurusan');
            $table->string('mengambil');
            $table->string('petugas');
            $table->date('tanggal_kembali');
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
