<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMintaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minta', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->string('nama_dosen');
            $table->string('mata_kuliah');
            $table->string('kelas');
            $table->string('nama_bahan');
            $table->string('jumlah');
            $table->string('satuan');
            $table->string('keterangan');
            $table->string('mengambil');
            $table->string('petugas');
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
        Schema::dropIfExists('minta');
    }
}
