<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persediaan extends Model
{
    use HasFactory;

    protected $table = 'persediaan';
    protected $primaryKey = 'id';

    protected $fillable = [
            'nama_barang',
            'merk',
            'satuan',
            'tahun_peroleh',
            'volumeBarang_saldo',
            'volumeBarang_masuk',
            'volumeBarang_keluar',
            'volumeBarang_sisa',
            'harga_satuan',
            'jumlah',
    ];

}
