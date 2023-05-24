<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;

    protected $table = 'pinjam';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_dosen',
        'jurusan',
        'program_studi',
        'nama_kegiatan',
        'tanggal',
        'tanggal_kembali',
        'nama_barang',
        'tahun_peroleh',
        'jumlah',
        'keterangan',
    ];

    protected $hidden = [];

    public function detailData($id){
        return DB::table('pinjam')->where('id', $id)->first();
    }

}
