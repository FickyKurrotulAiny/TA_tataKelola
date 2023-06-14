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
        'keterangan',
    ];

    protected $hidden = [];

    public function details(){
        return $this->hasMany(PinjamDetail::class,'id_pinjam');
    }

}