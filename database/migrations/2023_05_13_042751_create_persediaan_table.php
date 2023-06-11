<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersediaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persediaan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_barang')->unique();
            $table->string('merk');
            $table->string('satuan');
            $table->string('tahun_peroleh');
            $table->string('volumeBarang_saldo');
            $table->string('volumeBarang_masuk');
            $table->string('volumeBarang_keluar');
            $table->string('volumeBarang_sisa');
            $table->string('harga_satuan');
            $table->string('jumlah');
            $table->string('image', 255)->nullable();
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
        Schema::dropIfExists('persediaan');
    }
}
