<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $table = 'inventaris';
    protected $primaryKey = 'id';

    protected $fillable = [
            'kode_barang',
            'nama_barang',
            'satuan',
            'tahun_peroleh',
            'sumber_anggaran',
            'NUP',
            'merk',
            'jumlah',
            'nilai_barang',
            'kondisi_baru',
            'kondisi_rusakRingan',
            'kondisi_rusakBerat',
            'kondisi_hilang',
            'pelebelan_sudah',
            'pelebelan_belum',
            'namapengguna_unit',
            'namapengguna_individu',
            'nama_gedung',
            'nama_ruangan',
            'tempat',
            'keterangan',
    ];



}
