<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peminjaman extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'peminjaman';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tanggal',
        'kode_barang',
        'nama_barang',
        'jumlah_barang',
        'nama_peminjam',
        'jurusan',
        'petugas',
        'mengambil',
        'tanggal_kembali',
        'nama_kegiatan',
        'kelas',
        'program_studi',
        'keterangan',
        'mengembalikan',
        'menerima',
        'keadaan_barang',
    ];

    protected $hidden = [];

    // public function detailData($id){
    //     return DB::table('peminjaman')->where('id', $id)->first();
    // }

    public function details(){
        return $this->hasMany(PeminjamanDetail::class,'id_peminjaman');
    }
}
