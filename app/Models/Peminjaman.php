<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

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
    ];

    protected $hidden = [];

    public function detailData($id){
        return DB::table('peminjaman')->where('id', $id)->first();
    }
}
