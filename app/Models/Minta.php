<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minta extends Model
{
    use HasFactory;

    protected $table = 'minta';
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
        'mengambil',
        'petugas',
    ];
}
