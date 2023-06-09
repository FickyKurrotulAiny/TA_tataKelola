<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permintaan extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'permintaan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tanggal',
        'nama_dosen',
        'mata_kuliah',
        'kelas',
        'nama_bahan',
        'jumlah',
        'satuan',
        'keterangan',
    ];

    protected $hidden = [];

    public function details(){
        return $this->hasMany(PermintaanDetail::class,'id_permintaan');
    }
}
